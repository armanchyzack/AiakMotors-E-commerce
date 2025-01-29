<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Spin;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    function userLogin()
    {
        return view('Frontend.auth.login');
    }
    function userRegister()
    {
        return view('Frontend.auth.regester');
    }

    function userProfile()
    {

        $user = auth()->user();

        // Get the latest spin for the user, order by the latest created_at first
        $latestSpin = Spin::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first(); // This will return the most recent spin


        return view('Frontend.Profile.user_dashboard', compact('latestSpin'));
    }


// Shows the reset password form
public function userPasswordForget(Request $request, $token=[])
{
    return view('Frontend.auth.password_reset')->with([
        'token' => $token,
        'email' => $request->email
    ]);
}

// Handles the password reset
public function resetPassword(Request $request)
{

        Log::info('Reset Password Request:', $request->all());

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Password has been reset!');
        }

        return back()->withErrors(['email' => [trans($response)]]);

}
    public function edit()
    {
        return view('Frontend.auth.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::min(8)],
        ];

        // Validate only the fields that are being updated
        $request->validate($rules);

        // Update user information if fields are provided
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }

        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the updated user data
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    // public function show($type, $id)
    // {
    //     $item = null;
    //     $relatedProducts = [];
    //     $image = null;

    //     if ($type === 'car') {
    //         // Fetch the car and its images
    //         $item = Car::findOrFail($id);
    //         $image = Image::where('car_id', $id)->get();
    //         $breadcrumb = [
    //             ['name' => 'Home', 'url' => route('car')], // Adjust 'home' route name
    //             ['name' => 'Car', 'url' => route('car', $type)],
    //             ['name' => $item->name, 'url' => null], // Current product
    //         ];
    //         // Fetch related cars (e.g., same category or similar model)
    //         $relatedProducts = Car::where('category_id', $item->category_id)
    //             ->where('id', '!=', $id) // Exclude the current car
    //             ->take(4) // Limit to 4 related items
    //             ->get();
    //     } elseif ($type === 'accessory') {
    //         // Fetch the accessory
    //         $item = Accessory::findOrFail($id);
    //         $breadcrumb = [
    //             ['name' => 'Home', 'url' => route('car')], // Adjust 'home' route name
    //             ['name' => 'Accessory', 'url' => route('accessory', $type)],
    //             ['name' => $item->name, 'url' => null], // Current product
    //         ];
    //         // Fetch related accessories (e.g., same type or category)
    //         $relatedProducts = Accessory::where('category_id', $item->category_id)
    //             ->where('id', '!=', $id) // Exclude the current accessory
    //             ->take(4) // Limit to 4 related items
    //             ->get();
    //     }
    //     $comments = Comment::where('product_id', $id)->with('user')->latest()->get();

    //     return view('Frontend.product_view', compact('item', 'type', 'image', 'relatedProducts', 'comments', 'breadcrumb'));
    // }
    public function show($type, $id)
    {
        $item = null;
        $relatedProducts = [];
        $image = null;
        $breadcrumb = [];

        if ($type === 'car') {
            $item = Car::findOrFail($id);
            $image = Image::where('car_id', $id)->get();
            $breadcrumb = [
                ['name' => 'Home', 'url' => route('car')],
                ['name' => 'Car', 'url' => route('car', $type)],
                ['name' => $item->name, 'url' => null],
            ];
            $relatedProducts = Car::where('category_id', $item->category_id)
                ->where('id', '!=', $id)
                ->take(4)
                ->get();
        } elseif ($type === 'accessory') {
            $item = Accessory::findOrFail($id);
            $breadcrumb = [
                ['name' => 'Home', 'url' => route('accessory')],
                ['name' => 'Accessory', 'url' => route('accessory', $type)],
                ['name' => $item->name, 'url' => null],
            ];
            $relatedProducts = Accessory::where('category_id', $item->category_id)
                ->where('id', '!=', $id)
                ->take(4)
                ->get();
        }

        $comments = Comment::where('product_id', $id)->with('user')->latest()->get();

        return view('Frontend.product_view', compact('item', 'type', 'image', 'relatedProducts', 'comments', 'breadcrumb'));
    }


    function Commentstore(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000', // Validation for the comment content
            'product_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $carExists = Car::where('id', $value)->exists();
                    $accessoryExists = Accessory::where('id', $value)->exists();

                    if (!$carExists && !$accessoryExists) {
                        $fail('The selected product is invalid.');
                    }
                },
            ],
        ]);

        // Create a new comment
        $comment = new Comment();
        $comment->user_id = Auth::id(); // Store the ID of the logged-in user
        $comment->product_id = $request->product_id; // Associate the comment with the product
        $comment->content = $request->content; // Save the validated comment content
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
