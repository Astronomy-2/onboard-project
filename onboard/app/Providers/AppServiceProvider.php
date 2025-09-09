<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Client_onboarding;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $client = null;

            if (Auth::check()) {
                // Logged-in user এর সাথে client relation ধরে নেওয়া
                $client = Client_onboarding::where('user_id', Auth::id())->first();
            }

            $view->with('client', $client);
        });
    }
}
