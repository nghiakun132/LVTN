<?php

namespace App\Providers;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categoriesGlobal = \App\Models\Category::all();
        $brandGlobal = \App\Models\Brands::all();
        $groupGlobal = \App\Models\Groups::all();
        $colorGlobal = \App\Models\Colors::all();
        try {
            view()->share('categoriesGlobal', $categoriesGlobal);
            view()->share('brandGlobal', $brandGlobal);
            view()->share('groupGlobal', $groupGlobal);
            view()->share('colorGlobal', $colorGlobal);
        } catch (\Exception $e) {
        }
    }
}