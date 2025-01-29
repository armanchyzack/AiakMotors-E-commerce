<?php

namespace App\Providers;

use Log;
use App\Models\Cart;
use App\Models\logo;
use App\Models\footer;
use App\Models\Social;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\PopUpMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        DB::listen(function ($query) {
            \Log::info($query->sql);
        });




    // Debug the SQL query and its parameters


        // categories call

            $categories = Category::whereHas('cars', function ($query) {
                $query->where('status', 1);
            })->orWhereHas('accessories', function ($query) {
                $query->where('status', 1);
            })->
            select('id', 'title','slug')->get();
            View::share('categories', $categories);
            // // logo call
            $logo = logo::first();
            View::share('logo', $logo);
            // footer call

            $footer = footer::first();
            View::share('footer', $footer);
            // social icon call
            $comapnyinfo = CompanyInfo::select('phone_number')->first();
            View::share('comapnyinfo', $comapnyinfo);
            $social = Social::first();
            View::share('social', $social);
            // pop up message
            $popup = PopUpMessage::first();
            View::share('popup', $popup);
            View::composer('Frontend.layouts.front_end', function ($view) {
                $cartCount = 0;

                // Check if the user is authenticated
                if (Auth::check()) {
                    $cartCount = Cart::where('user_id', Auth::id())->count();
                }

                // Share cart count globally with all views
                $view->with('cartCount', $cartCount);
            });


    }
}
