<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Payment;

use Illuminate\Support\ServiceProvider;

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
    

    public function boot()
    {
        // Share booking existence data with the navigation view
        View::composer('layout.navigation', function ($view) {
            $paymentExists = Payment::where('user_id', auth()->id())->exists();
            $view->with('paymentExists', $paymentExists);
        });
    }
}
