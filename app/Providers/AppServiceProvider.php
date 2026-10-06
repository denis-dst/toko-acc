<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('site_settings')) {
                    $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
                    $view->with('siteSettings', $settings);
                } else {
                    $view->with('siteSettings', []);
                }

                if (Schema::hasTable('categories')) {
                    $navCategories = Category::where('status', true)->orderBy('sort_order', 'asc')->get();
                    $view->with('navCategories', $navCategories);
                } else {
                    $view->with('navCategories', collect());
                }
            } catch (\Throwable $e) {
                $view->with('siteSettings', []);
                $view->with('navCategories', collect());
            }
        });
    }
}
