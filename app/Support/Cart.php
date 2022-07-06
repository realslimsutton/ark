<?php

namespace App\Support;

use Session;

class Cart
{
    private static string $SESSION_KEY = 'store.cart';

    public static function add($item): void
    {
        Session::put(
            'store.cart',
            array_merge(
                Session::get(static::$SESSION_KEY, []),
                [$item]
            )
        );
    }

    public static function clear()
    {
        Session::forget(static::$SESSION_KEY);
    }
}
