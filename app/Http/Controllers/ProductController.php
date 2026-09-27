<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Category::where('status', true)->orderBy('sort_order', 'asc')->get();

        $query = Product::where('status', true)->with(['category', 'primaryImage']);

        // Filter category by slug
        $selectedCategory = null;
        if ($request->filled('kategori')) {
            $selectedCategory = Category::where('slug', $request->kategori)->first();
            if ($selectedCategory) {
                $query->where('category_id', $selectedCategory->id);
            }
        }

        // Search by keyword
        if ($request->filled('q')) {
            $keyword = trim($request->q);
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('short_description', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%")
                  ->orWhere('material', 'like', "%{$keyword}%");
            });
        }

        // Sorting
        $sort = $request->get('sort', 'sort_order');
        switch ($sort) {
            case 'terbaru':
                $query->latest();
                break;
            case 'nama_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'nama_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'harga_rendah':
                $query->orderByRaw('CASE WHEN price IS NULL THEN 1 ELSE 0 END, price ASC');
                break;
            case 'harga_tinggi':
                $query->orderByRaw('CASE WHEN price IS NULL THEN 1 ELSE 0 END, price DESC');
                break;
            default:
                $query->orderBy('sort_order', 'asc')->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function category(string $slug): View
    {
        $selectedCategory = Category::where('slug', $slug)->where('status', true)->firstOrFail();
        $categories = Category::where('status', true)->orderBy('sort_order', 'asc')->get();

        $products = Product::where('status', true)
            ->where('category_id', $selectedCategory->id)
            ->with(['category', 'primaryImage'])
            ->orderBy('sort_order', 'asc')
            ->paginate(12)
            ->withQueryString();

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->where('status', true)
            ->with(['category', 'images', 'primaryImage'])
            ->firstOrFail();

        // Related products in same category
        $relatedProducts = Product::where('status', true)
            ->where('id', '!=', $product->id)
            ->when($product->category_id, function ($q) use ($product) {
                $q->where('category_id', $product->category_id);
            })
            ->with(['category', 'primaryImage'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
