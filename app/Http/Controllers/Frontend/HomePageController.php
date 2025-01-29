<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Cart;
use App\Models\Logo;
use App\Models\Spin;
use App\Models\Image;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Detail;
use App\Models\Service;
use App\Models\Category;
use App\Models\Accessory;
use App\Models\WheelSlice;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Models\SpinWheelData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    // Method to get sorted car listings with optimized caching
    public function index(Request $request)
{
    $sort = $request->input('sort');

    // Cache car listings for 60 minutes with pagination
    $cars = Cache::remember('cars_sorted_' . $sort, 60, function () use ($sort) {
        $query = Car::select('id', 'name', 'price', 'discount_price', 'image_url')
            ->where('status', 1)
            ->with('images'); // Eager load images

        if ($sort) {
            $order = $sort == 'high_to_low' ? 'desc' : 'asc';
            $query->orderBy('price', $order);
        }

        // Paginate 8 items per page
        return $query->paginate(8);
    });

    return view('Frontend.index', compact('cars', 'sort'));
}

    // Method to get sorted and paginated accessories
    public function indexAccessory(Request $request)
    {
        $query = Accessory::select('id', 'name', 'price', 'discount_price', 'image_url', 'stock')
            ->where('status', 1);

        // Handle Price Filter
        if ($request->has('price') && in_array($request->price, ['high_to_low', 'low_to_high'])) {
            $order = $request->price == 'high_to_low' ? 'desc' : 'asc';
            $query->orderBy('price', $order);
        } else {
            // Default: Show most recently added products
            $query->orderBy('created_at', 'desc');
        }

        // Paginate 8 items and cache for 60 minutes
        $accessories = Cache::remember('accessories_' . $request->price, 60, function () use ($query) {
            return $query->paginate(8);
        });

        return view('Frontend.accessory', compact('accessories'));
    }

    // Method to get cars and accessories in the same category
    public function indexCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        // Optimize with eager loading for related models
        $cars = Car::where('category_id', $category->id)->with('images')->get();
        $accessories = Accessory::where('category_id', $category->id)->get();

        // Merge both collections and paginate manually
        $combined = $cars->merge($accessories);
        $perPage = 8;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $combined->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedItems = new LengthAwarePaginator($currentItems, $combined->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('Frontend.cateory_product', compact('category', 'paginatedItems'));
    }

    // Method to get services with caching
    public function indexService()
    {
        $services = Cache::remember('services', 60, function () {
            return Service::select('id', 'name', 'price', 'image')->paginate(8);
        });

        return view('Frontend.service', compact('services'));
    }

    // Method to display spinner and related data
    public function spinner()
    {

        if(Auth::check()){

        // Cache spin data and prizes for 60 minutes
        $spinData = Cache::remember('spin_data', 60, function () {
            return SpinWheelData::first();
        });

        $prizes = $spinData ? [$spinData->prize_one, $spinData->prize_two, $spinData->prize_three] : [];

        // Fetch active coupons and add to prizes
        $coupons = Cache::remember('active_coupons', 60, function () {
            return Coupon::where('status', 'active')->inRandomOrder()->limit(5)->get();
        });

        foreach ($coupons as $coupon) {
            $prizes[] = [
                'code' => $coupon->code,
                'discount' => $coupon->discount,
            ];
        }

        $wheelslice = Cache::remember('wheelslice', 60, function () {
            return WheelSlice::get();
        });

        $details = Cache::remember('details', 60, function () {
            return Detail::first();
        });

        return view('Frontend.spinewheel', compact('prizes', 'wheelslice', 'details'));
        }else{
        return view('Frontend.auth.login');

        }
    }

    // Method to handle search with caching
    public function search(Request $request)
    {
        $query = strtolower($request->get('query', ''));
        $category = strtolower($request->get('category', 'all'));
        $response = [];

        if ($category == 'all' || $category == 'cars') {
            $cars = Cache::remember('cars_search_' . $query, 60, function () use ($query) {
                return Car::where('name', 'like', '%' . $query . '%')
                          ->select('id', 'name', 'price', 'discount_price', 'image_url') // Limit columns
                          ->get();
            });
            $response['cars'] = $cars;
        }

        if ($category == 'all' || $category == 'accessories') {
            $accessories = Cache::remember('accessories_search_' . $query, 60, function () use ($query) {
                return Accessory::where('name', 'like', '%' . $query . '%')
                                ->select('id', 'name', 'price', 'discount_price', 'image_url', 'stock') // Limit columns
                                ->get();
            });
            $response['accessories'] = $accessories;
        }

        return response()->json($response);
    }

    // Method to show search results
    public function searchResults(Request $request)
    {
        $query = strtolower($request->get('query', ''));

        if (empty($query)) {
            return redirect()->route('car');
        }

        // Search cars and accessories with pagination and optimization
        $cars = Car::where('name', 'like', '%' . $query . '%')
                   ->orderBy('name', 'asc')
                   ->select('id', 'name', 'price', 'discount_price', 'image_url') // Limit columns
                   ->paginate(8);

        $accessories = Accessory::where('name', 'like', '%' . $query . '%')
                                ->orderBy('name', 'asc')
                                ->select('id', 'name', 'price', 'discount_price', 'image_url', 'stock') // Limit columns
                                ->paginate(8);

        return view('Frontend.search_results', compact('cars', 'accessories', 'query'));
    }

    // Method to show the user's order list with caching
    public function orderlist()
    {
        $orders = Cache::remember('user_orders_' . auth()->id(), 60, function () {
            return Order::where('user_id', auth()->id())->get();
        });

        return view('Frontend.Profile.orderlist', compact('orders'));
    }

    // Method to display company details with fixed map location
    public function OurShopDetails()
    {
        $companyInfo = CompanyInfo::first();
        $companyInfo->address_map_link = '40.748817,-73.985428'; // Example coordinates
        return view('Frontend.ourshop', compact('companyInfo'));
    }
}
