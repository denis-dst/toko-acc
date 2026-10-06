<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Schema;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap for Google indexing.
     */
    public function index(): Response
    {
        $urls = [];
        $baseUrl = rtrim(config('app.url', url('/')), '/');

        // 1. Static Key Pages
        $urls[] = [
            'loc' => $baseUrl . '/',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'daily',
            'priority' => '1.0',
        ];

        $urls[] = [
            'loc' => $baseUrl . '/katalog',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'daily',
            'priority' => '0.9',
        ];

        $urls[] = [
            'loc' => $baseUrl . '/portofolio',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => $baseUrl . '/tentang-kami',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];

        $urls[] = [
            'loc' => $baseUrl . '/lokasi',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];

        $urls[] = [
            'loc' => $baseUrl . '/testimoni',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority' => '0.6',
        ];

        $urls[] = [
            'loc' => $baseUrl . '/kontak',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        // 2. Categories, Products, Portfolios
        try {
            if (Schema::hasTable('categories')) {
                $categories = Category::where('status', true)->get();
                foreach ($categories as $cat) {
                    $urls[] = [
                        'loc' => $baseUrl . '/kategori/' . $cat->slug,
                        'lastmod' => $cat->updated_at ? $cat->updated_at->format('Y-m-d') : date('Y-m-d'),
                        'changefreq' => 'weekly',
                        'priority' => '0.85',
                    ];
                }
            }

            if (Schema::hasTable('products')) {
                $products = Product::where('status', true)->get();
                foreach ($products as $prod) {
                    $urls[] = [
                        'loc' => $baseUrl . '/katalog/' . $prod->slug,
                        'lastmod' => $prod->updated_at ? $prod->updated_at->format('Y-m-d') : date('Y-m-d'),
                        'changefreq' => 'weekly',
                        'priority' => '0.8',
                    ];
                }
            }

            if (Schema::hasTable('portfolios')) {
                $portfolios = Portfolio::where('status', true)->get();
                foreach ($portfolios as $port) {
                    $urls[] = [
                        'loc' => $baseUrl . '/portofolio/' . $port->slug,
                        'lastmod' => $port->updated_at ? $port->updated_at->format('Y-m-d') : date('Y-m-d'),
                        'changefreq' => 'monthly',
                        'priority' => '0.7',
                    ];
                }
            }
        } catch (\Throwable $e) {
            // Safe fallback if database is not initialized yet
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $u) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= '    <lastmod>' . $u['lastmod'] . "</lastmod>\n";
            $xml .= '    <changefreq>' . $u['changefreq'] . "</changefreq>\n";
            $xml .= '    <priority>' . $u['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
