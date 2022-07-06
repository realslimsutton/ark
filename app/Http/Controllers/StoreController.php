<?php

namespace App\Http\Controllers;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }

    public function show($slug)
    {
        return view('store.show', [
            'slug' => $slug
        ]);
    }
}
