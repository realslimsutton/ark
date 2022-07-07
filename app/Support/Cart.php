<?php

namespace App\Support;

use Session;

class Cart
{
    private static string $SESSION_KEY = 'store.cart';

    public static function get(): array
    {
        return Session::get(static::$SESSION_KEY, []);
    }

    public static function add(array $item): void
    {
        Session::put(
            static::$SESSION_KEY,
            array_merge(
                static::get(),
                [$item]
            )
        );
    }

    public static function replace(array $cart): void
    {
        Session::put(static::$SESSION_KEY, $cart);
    }

    public static function clear(): void
    {
        Session::forget(static::$SESSION_KEY);
    }

    public static function count(): int
    {
        return collect(static::get())->sum(fn($product) => $product['quantity']);
    }
}
