<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MobileRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the request comes from a mobile device
        if ($this->isMobile()) {
            // Redirect to an external domain if it's a mobile device
            return redirect()->away('https://m.letselschadetest.nl');
        }

        // Continue with the next middleware if not mobile
        return $next($request);
    }

    /**
     * Determine if the user is on a mobile device.
     *
     * @return bool
     */
    protected function isMobile()
    {
        return preg_match('/(android|iphone|ipad|ipod|blackberry|webos|windows phone|symbian|kindle)/i', $_SERVER['HTTP_USER_AGENT']);
    }
}
