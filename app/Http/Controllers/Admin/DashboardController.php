<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('status', true)->count(),
            'total_categories' => Category::count(),
            'total_portfolios' => Portfolio::count(),
            'total_testimonials' => Testimonial::count(),
        ];

        $latestProducts = Product::with(['category', 'primaryImage'])
            ->latest()
            ->take(5)
            ->get();

        $latestPortfolios = Portfolio::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestProducts', 'latestPortfolios'));
    }
}
