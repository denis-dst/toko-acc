<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'site_name',
            'tagline',
            'description',
            'whatsapp',
            'phone',
            'email',
            'address',
            'opening_hours',
            'google_maps_url',
            'google_maps_embed',
            'instagram',
            'facebook',
            'tiktok',
            'youtube',
            'meta_keywords',
            'meta_google_verification',
            'google_analytics_id',
        ];

        foreach ($fields as $field) {
            $val = $request->input($field);
            if ($field === 'google_maps_embed' && !empty($val)) {
                if (preg_match('/src=[\'"]([^\'"]+)[\'"]/i', $val, $matches)) {
                    $val = $matches[1];
                }
            }
            SiteSetting::set($field, $val);
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('settings', 'public');
            SiteSetting::set('logo', $path);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
