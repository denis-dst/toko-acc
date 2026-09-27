<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(Request $request): View
    {
        $query = Portfolio::where('status', true);

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $portfolios = $query->orderBy('sort_order', 'asc')->latest()->paginate(9)->withQueryString();

        $categories = Portfolio::where('status', true)
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('portfolios.index', compact('portfolios', 'categories'));
    }

    public function show(string $slug): View
    {
        $portfolio = Portfolio::where('slug', $slug)
            ->where('status', true)
            ->with('images')
            ->firstOrFail();

        $relatedPortfolios = Portfolio::where('status', true)
            ->where('id', '!=', $portfolio->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        return view('portfolios.show', compact('portfolio', 'relatedPortfolios'));
    }
}
