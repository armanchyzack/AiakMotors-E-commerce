<?php

use App\Models\Car;
use App\Models\User;
use App\Models\Image;
use App\Models\DiscountCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\SpinController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\SpinnerController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\BackendController\MenuController;
use App\Http\Controllers\BackendController\DetailController;
use App\Http\Controllers\BackendController\FooterController;
use App\Http\Controllers\BackendController\ProductController;
use App\Http\Controllers\BackendController\ServiceController;
use App\Http\Controllers\BackendController\CategoryController;
use App\Http\Controllers\BackendController\AccessoryController;
use App\Http\Controllers\BackendController\OrderListController;
use App\Http\Controllers\BackendController\SpinWheelController;
use App\Http\Controllers\BackendController\WheelSliceController;
use App\Http\Controllers\BackendController\CompanyInfoController;
use App\Http\Controllers\BackendController\SocialMediaController;
use App\Http\Controllers\BackendController\DiscountCodeController;
use App\Http\Controllers\BackendController\DiscountTextController;
use App\Http\Controllers\BackendController\MarqueryTextController;
use App\Http\Controllers\BackendController\PopUpMessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $cars = Car::select('id', 'name', 'price', 'discount_price', 'image_url')->where('status',1)->get();
//     $carimages = Image::get();

//     return view('Frontend.index',compact('cars', 'carimages'));
// });

Route::get('/exit-pop-up-message', function () {
    return view('Frontend.exit_pop_up');
});
// HomePage Routes
Route::get('/', [HomePageController::class, 'index'])->name('car');
Route::get('/accessory', [HomePageController::class, 'indexAccessory'])->name('accessory');
Route::get('/service', [HomePageController::class, 'indexService'])->name('service');
Route::get('/spinner', [HomePageController::class, 'spinner'])->name('spinner');
Route::get('/spinner/details', [HomePageController::class, 'DetailsSpinner'])->name('spinner.details');
Route::get('/our-shop/details', [HomePageController::class, 'OurShopDetails'])->name('our.shop.details');
Route::get('/category/{categories:slug}', [HomePageController::class, 'indexCategory'])->name('category');
Route::get('/search', [HomePageController::class, 'search'])->name('search');
Route::get('/search/results', [HomePageController::class, 'searchResults'])->name('searchResults');


// Order and Checkout Routes
Route::middleware('auth','role:user')->controller(CartController::class)->group(function () {

    Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('checkout.form');
    Route::get('/order', [OrderController::class, 'orderConfirm'])->name('order');
});


// Coupon Route
Route::post('/coupon/apply', [CartController::class, 'applyCoupon'])->name('coupon.apply');

// User Authentication & Profile Routes
Route::middleware('guest')->group(function () {
    Route::get('user/login', [UserController::class, 'userLogin'])->name('user.login');
    Route::get('user/register', [UserController::class, 'userRegister'])->name('user.register');
});
// Route::middleware('auth')->group(function () {
//     // Route to display password update form
//     Route::get('/password/update', [AuthController::class, 'showPasswordUpdateForm'])->name('password.update.form');

//     // Route to handle password update
//     Route::put('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
// });
Route::middleware('auth','role:user')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
});
Route::get('user/profile', [UserController::class, 'userProfile'])->name('user.profile');
Route::get('user/password-forget/{token}', [UserController::class, 'userPasswordForget'])->name('user.password.forget');
Route::post('password/reset', [UserController::class, 'reset'])->name('password.update');

Route::get('password/reset/{token}', [UserController::class, 'userPasswordForget'])->name('password.reset');
Route::get('password/reset', [UserController::class, 'resetPassword'])->name('password.update');










// Product & Comments Routes
Route::get('/product/{type}/{id}', [UserController::class, 'show'])->name('item.show');

Route::post('/comments', [UserController::class, 'Commentstore'])->name('comments.store');
// Accessory Product Show Route

// Authenticated Routes with Middleware
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/my-orders', [HomePageController::class, 'orderlist'])->name('order.list');
    Route::post('/spin', [SpinnerController::class, 'spin'])->name('spin');
});

// cart route
Route::middleware('auth','role:user')->controller(CartController::class)->group(function () {
    Route::get('/cart/{id}','addToCart')->name('cart.add');
    Route::get('/cart-checkout',  'goToCart')->name('cart.checkout');
    Route::post('/apply-discount', 'applyDiscount')->name('apply-discount');
    Route::delete('/cart/{id}',  'remove')->name('cart.remove');
    Route::post('/apply-prize', 'applyPrize')->name('apply.prize');
});




Auth::routes();

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


    // */ Category route */
    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insertCategory')->name('store');
        route::get('/all', 'allCategory')->name('all');
        route::get('/edit{categories:id}', 'editCategory')->name('edit');
        route::put('/update{categories:id}', 'updateCategory')->name('update');
        route::delete('/delete{categories:id}', 'deleteCategory')->name('delete');
        route::get('status-update/{categories:id}', 'statusUpdate')->name('status.update');
    });

    Route::prefix('menu')->name('menu.')->controller(MenuController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insertNav')->name('store');
        route::get('/all', 'allNav')->name('all');
        route::get('/edit{menus:id}', 'editMenu')->name('edit');
        route::put('/update{menus:id}', 'updateNav')->name('update');
        route::delete('/delete{menus:id}', 'deleteNav')->name('delete');
    });
    Route::prefix('logo')->name('logo.')->controller(MenuController::class)->group(function () {
        route::get('/', 'viewlogo')->name('view');
        route::post('/add', 'storelogo')->name('store');
        route::put('/update{logo:id}', 'updatelogo')->name('update');
    });

    Route::prefix('social')->name('social.')->controller(SocialMediaController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::put('/update{socials:id}', 'update')->name('update');
    });
    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::get('/all', 'allProduct')->name('all');
        route::get('/edit/{cars:id}', 'editProduct')->name('edit');
        route::put('/update/{cars:id}', 'updateProduct')->name('update');
        route::get('status-update/{cars:id}', 'statusUpdate')->name('status.update');
        route::delete('/delete{cars:id}', 'deleteCar')->name('delete');
        Route::delete('/gallery-image-delete/{image}', 'deleteGalleryImage')->name('gallary.image.delete');

    });

    Route::prefix('accessory')->name('accessory.')->controller(AccessoryController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::get('/all', 'allAccessory')->name('all');
        route::get('status-update/{accessories:id}', 'statusUpdate')->name('status.update');
        route::get('/edit/{accessories:id}', 'editAccessory')->name('edit');
        route::put('/update/{accessories:id}', 'updateAccessory')->name('update');
        route::delete('/delete{accessories:id}', 'deleteAccessory')->name('delete');
    });





    Route::prefix('discount-code')->name('discount.code.')->controller(DiscountCodeController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::get('/all', 'allDiscountCode')->name('all');
        route::get('status-update/{coupon:id}', 'statusUpdate')->name('status.update');
        route::get('/edit/{coupon:id}', 'editdiscountCode')->name('edit');
        route::put('/update/{coupon:id}', 'updateDiscountCode')->name('update');
        route::delete('/delete{coupon:id}', 'deleteDiscountCode')->name('delete');
        Route::get('coupon-usage', 'cuponuser')->name('coupon.usage');
    });














    Route::prefix('footer')->name('footer.')->controller(FooterController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::put('/update{footer:id}', 'update')->name('update');
    });
    Route::prefix('services')->name('service.')->controller(ServiceController::class)->group(function () {
        // Display the form to add a service (GET request)
        Route::get('/', 'view')->name('view'); // This should show the add service form

        // Store a new service (POST request)
        Route::post('/add', 'insert')->name('store'); // This should handle the form submission

        // Display all services (GET request)
        Route::get('/all', 'allService')->name('all'); // This should list all services

        route::get('/edit/{service:id}', 'editService')->name('edit');
        route::put('/update/{service:id}', 'updateService')->name('update');
        // route::get('status-update/{cars:id}', 'statusUpdate')->name('status.update');
        route::delete('/delete{service:id}', 'delete')->name('delete');
        // route::get('/gallary-image-delete/{images:id}', 'GallarydeleteImage')->name('gallary.image.delete');
    });

    Route::prefix('marquery')->name('marquery.')->controller(MarqueryTextController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::put('/update{marquery:id}', 'update')->name('update');
    });

    Route::prefix('discounttext')->name('discount.text.')->controller(DiscountTextController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::put('/update{discountText:id}', 'update')->name('update');
    });

    Route::prefix('popupmessage')->name('popup.message.')->controller(PopUpMessageController::class)->group(function () {
        Route::get('/', 'index')->name('manage');
        Route::post('/storeOrUpdate', 'storeOrUpdate')->name('storeOrUpdate');
    });


    Route::prefix('order')->name('orders.')->controller(OrderListController::class)->group(function () {
        // View all orders (pending by default)
        Route::get('/', 'index')->name('index');

        // Confirm an order (approve it)
        Route::post('/confirm/{id}', 'confirmOrder')->name('confirm');

        // Ship an order
        Route::post('/ship', 'shipOrder')->name('ship');

        // View confirmed orders (approved orders)
        Route::get('/confirmed', 'confirmedOrders')->name('confirmed');

        // View delivered orders
        Route::get('/delivered', 'deliveredOrders')->name('delivered');

        // Update order status (pending, approved, delivered)
        Route::patch('/{orderId}/update', 'updateStatus')->name('update.status');
    });











    Route::prefix('spinewheel')->name('spinewheel.')->controller(SpinWheelController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        route::put('/update{spinewheel:id}', 'update')->name('update');
    });



    Route::prefix('wheelslice')->name('wheel.slice.')->controller(WheelSliceController::class)->group(function () {
        route::get('/', 'view')->name('view');
        route::post('/add', 'insert')->name('store');
        Route::put('/wheel-slice/update',  'update')->name('update');
    });


    Route::prefix('details')->name('details.')->controller(DetailController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/',  'store')->name('store');

        Route::put('/update/{id}',  'update')->name('update');
    });
    Route::prefix('')->name('company.info.')->controller(CompanyInfoController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('insert','store')->name('store');
        Route::put('/{companyInfo}', 'update')->name('update');
    });



});


