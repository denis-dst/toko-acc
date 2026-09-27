<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::where('status', true)
            ->withCount(['products' => function ($q) {
                $q->where('status', true);
            }])
            ->orderBy('sort_order', 'asc')
            ->get();

        $featuredProducts = Product::where('status', true)
            ->where('featured', true)
            ->with(['category', 'primaryImage'])
            ->orderBy('sort_order', 'asc')
            ->take(8)
            ->get();

        // If featured products is less than 4, fallback to latest products
        if ($featuredProducts->count() < 4) {
            $featuredProducts = Product::where('status', true)
                ->with(['category', 'primaryImage'])
                ->orderBy('sort_order', 'asc')
                ->take(8)
                ->get();
        }

        $portfolios = Portfolio::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        $testimonials = Testimonial::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('home', compact('categories', 'featuredProducts', 'portfolios', 'testimonials'));
    }
}
