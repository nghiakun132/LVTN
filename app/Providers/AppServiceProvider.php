<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        $categoriesGlobal = \App\Models\Category::with([
            'parent' => function ($query) {
                $query->with([
                    'brand'
                ]);
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name', 'b_category_id', 'b_slug');
            },
        ])->where('parent_id', 0)
            ->where('c_status', 1)
            ->get();
        $categoriesGlobalSelect = \App\Models\Category::with([
            'parent' => function ($query) {
                $query->with([
                    'brand'
                ]);
            },
            'brand' => function ($query) {
                $query->select('b_id', 'b_name', 'b_category_id', 'b_slug');
            },
        ])
            ->where('c_status', 1)
            ->get();
        $brandGlobal = \App\Models\Brands::all();
        $groupGlobal = \App\Models\Groups::all();

        try {
            view()->share('categoriesGlobal', $categoriesGlobal);
            view()->share('brandGlobal', $brandGlobal);
            view()->share('groupGlobal', $groupGlobal);
            view()->share('categoriesGlobalSelect', $categoriesGlobalSelect);
        } catch (\Exception $e) {
            report($e);
        }
    }
}
