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
        $categoriesGlobal = \App\Models\Category::with([
            'parent' => function ($query) {
                $query->with([
                    'brand'
                ]);
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name', 'b_category_id');
            },
        ])->where('parent_id', 0)
            ->where('c_status', 1)
            ->get();
        // dd($categoriesGlobal);
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