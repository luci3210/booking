<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        // 'tourismoph.payment/hotels/xxxx',
        // 'api/tourismoph.payment/hotels/xxxx',
        // 'api/hotels/rooms/wishlist',
        // 'hotels/rooms/wishlist',
        // 'hotels/rooms/wishlist/wew',
        // 'api/hotels/rooms/wishlist/wew',
    ];
}
