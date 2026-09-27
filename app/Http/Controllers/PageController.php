<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function location(): View
    {
        return view('pages.location');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function testimonials(): View
    {
        $testimonials = Testimonial::where('status', true)
            ->orderBy('sort_order', 'asc')
            ->paginate(12);

        return view('pages.testimonials', compact('testimonials'));
    }
}
