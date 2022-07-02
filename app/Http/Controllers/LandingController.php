<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class LandingController extends Controller
{
    public function index()
    {
        return view('index', [
            'latestNews' => $this->getLatestNews()
        ]);
    }

    private function getLatestNews(): Collection
    {
        $post = [
            'title' => 'SMELL MAGIC IN THE AIR. OR MAYBE A BARBECUE',
            'summary' => 'With what mingled joy and sorrow do I take up the pen to write',
            'small_thumbnail' => 'https://html.nkdev.info/goodgames/assets/images/post-1-sm.jpg',
            'large_thumbnail' => 'https://html.nkdev.info/goodgames/assets/images/post-1.jpg'
        ];

        return collect([
            [
                'id' => 1,
                ...$post
            ],
            [
                'id' => 2,
                ...$post
            ],
            [
                'id' => 3,
                ...$post
            ],
            [
                'id' => 4,
                ...$post
            ],
            [
                'id' => 5,
                ...$post
            ],
            [
                'id' => 6,
                ...$post
            ],
            [
                'id' => 7,
                ...$post
            ],
            [
                'id' => 8,
                ...$post,
                'summary' => $post['summary'] . ' ' . $post['summary']
            ]
        ]);
    }
}
