<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(Request $request): View
    {
        $query = Portfolio::with('images');

        if ($request->filled('q')) {
            $keyword = trim($request->q);
            $query->where('title', 'like', "%{$keyword}%")
                  ->orWhere('client_name', 'like', "%{$keyword}%");
        }

        $portfolios = $query->orderBy('sort_order', 'asc')->latest()->paginate(15)->withQueryString();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create(): View
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:portfolios,slug'],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'project_year' => ['nullable', 'string', 'max:10'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'status' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ]);

        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('portfolio', 'public');
            $validated['cover_image'] = $path;
        }

        $portfolio = Portfolio::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('portfolio/gallery', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $path,
                    'caption' => $portfolio->title,
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio pekerjaan berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio): View
    {
        $portfolio->load('images');
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:portfolios,slug,' . $portfolio->id],
            'description' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'project_year' => ['nullable', 'string', 'max:10'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'status' => ['boolean'],
            'sort_order' => ['nullable', 'integer'],
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
        ]);

        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $validated['status'] = $request->boolean('status');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('cover_image')) {
            if ($portfolio->cover_image && !str_starts_with($portfolio->cover_image, 'http') && !str_starts_with($portfolio->cover_image, '/')) {
                Storage::disk('public')->delete($portfolio->cover_image);
            }
            $path = $request->file('cover_image')->store('portfolio', 'public');
            $validated['cover_image'] = $path;
        }

        $portfolio->update($validated);

        if ($request->hasFile('images')) {
            $maxSort = $portfolio->images()->max('sort_order') ?? 0;
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('portfolio/gallery', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $path,
                    'caption' => $portfolio->title,
                    'sort_order' => $maxSort + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio pekerjaan berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        if ($portfolio->cover_image && !str_starts_with($portfolio->cover_image, 'http') && !str_starts_with($portfolio->cover_image, '/')) {
            Storage::disk('public')->delete($portfolio->cover_image);
        }

        foreach ($portfolio->images as $img) {
            if (!str_starts_with($img->image, 'http') && !str_starts_with($img->image, '/')) {
                Storage::disk('public')->delete($img->image);
            }
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    public function deleteImage(PortfolioImage $image): RedirectResponse
    {
        if (!str_starts_with($image->image, 'http') && !str_starts_with($image->image, '/')) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return back()->with('success', 'Foto portofolio berhasil dihapus.');
    }
}
