<?php

namespace App\Providers;

use App\Models\LokerData;
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
        view()->composer('*', function ($view)
        {
            $current_loker = LokerData::get();

            $view->with('current_lokers', $current_loker);
        });
    }
}
