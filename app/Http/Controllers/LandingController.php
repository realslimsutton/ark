<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Donation;
use App\Models\OrderProduct;
use App\Models\Product;
use DB;
use Illuminate\Support\Collection;

class LandingController extends Controller
{
    public function index()
    {
        return view('index', [
            'latestNews' => $this->getLatestNews(),
            'bestSelling' => $this->getBestSellingProducts(),
            'topDonators' => $this->getTopDonators()
        ]);
    }

    private function getLatestNews(): Collection
    {
        return Article::query()
            ->with([
                'category',
                'media' => function ($query) {
                    $query->where('collection_name', '=', 'thumbnail');
                }
            ])
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();
    }

    private function getBestSellingProducts(): Collection
    {
        $limit = 9;

        $counts = DB::table('order_product')
            ->groupBy('product_id')
            ->select('product_id', DB::raw('count(*) as count'))
            ->orderByDesc('count')
            ->limit($limit)
            ->get();

        $products = Product::query()
            ->whereIn('id', $counts->map(fn($entry) => $entry->product_id))
            ->get();

        $limit -= $products->count();

        if ($limit === 0) {
            return $products;
        }

        $latestProducts = Product::query()
            ->whereNotIn('id', $products->map(fn(Product $product) => $product->id))
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->limit($limit)
            ->get();

        return $products->concat($latestProducts);
    }

    private function getTopDonators()
    {
        $totals = Donation::query()
            ->with('user')
            ->select('user_id', DB::raw('SUM(total) as sum'))
            ->groupBy('user_id')
            ->orderByDesc('sum')
            ->limit(5)
            ->get();

        return $totals->map(fn(Donation $donation) => $donation->user);
    }
}
