<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'primaryImage']);

        if ($request->filled('q')) {
            $keyword = trim($request->q);
            $query->where('name', 'like', "%{$keyword}%");
        }

        if ($request->filled('kategori')) {
            $query->where('category_id', $request->kategori);
        }

        $products = $query->orderBy('sort_order', 'asc')->latest()->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::where('status', true)->orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'material' => ['nullable', 'string', 'max:255'],
            'custom_info' => ['nullable', 'string', 'max:255'],
            'minimum_order' => ['nullable', 'string', 'max:100'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'price_label' => ['nullable', 'string', 'max:50'],
            'featured' => ['boolean'],
            'status' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ]);

        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        // Ensure slug is unique
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Product::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = "{$originalSlug}-" . $count++;
        }

        $validated['featured'] = $request->boolean('featured');
        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['price_label'] = $validated['price_label'] ?: 'Konsultasi';

        $product = Product::create($validated);

        if ($request->hasFile('images')) {
            $isFirst = true;
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'caption' => $product->name,
                    'is_primary' => $isFirst,
                    'sort_order' => $index + 1,
                ]);
                $isFirst = false;
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk katalog berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::orderBy('name')->get();
        $product->load(['images']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug,' . $product->id],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'material' => ['nullable', 'string', 'max:255'],
            'custom_info' => ['nullable', 'string', 'max:255'],
            'minimum_order' => ['nullable', 'string', 'max:100'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'price_label' => ['nullable', 'string', 'max:50'],
            'featured' => ['boolean'],
            'status' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ]);

        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $validated['featured'] = $request->boolean('featured');
        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['price_label'] = $validated['price_label'] ?: 'Konsultasi';

        $product->update($validated);

        if ($request->hasFile('images')) {
            $hasExistingPrimary = $product->images()->where('is_primary', true)->exists();
            $maxSort = $product->images()->max('sort_order') ?? 0;

            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'caption' => $product->name,
                    'is_primary' => !$hasExistingPrimary && $index === 0,
                    'sort_order' => $maxSort + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Data produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        foreach ($product->images as $img) {
            if (!str_starts_with($img->image, 'http') && !str_starts_with($img->image, '/')) {
                Storage::disk('public')->delete($img->image);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function deleteImage(ProductImage $image): RedirectResponse
    {
        $productId = $image->product_id;
        $wasPrimary = $image->is_primary;

        if (!str_starts_with($image->image, 'http') && !str_starts_with($image->image, '/')) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        // If the primary image was deleted, assign the next one as primary
        if ($wasPrimary) {
            $nextImage = ProductImage::where('product_id', $productId)->first();
            if ($nextImage) {
                $nextImage->update(['is_primary' => true]);
            }
        }

        return back()->with('success', 'Foto produk berhasil dihapus.');
    }

    public function setPrimaryImage(ProductImage $image): RedirectResponse
    {
        ProductImage::where('product_id', $image->product_id)->update(['is_primary' => false]);
        $image->update(['is_primary' => true]);

        return back()->with('success', 'Foto utama produk berhasil diubah.');
    }
}
