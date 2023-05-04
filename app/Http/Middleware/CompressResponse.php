<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompressResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof Response && $request->header('Accept-Encoding') && strpos($request->header('Accept-Encoding'), 'gzip') !== false) {
            $response->setContent(gzencode($response->getContent()));
            $response->header('Content-Encoding', 'gzip');
            $response->header('Vary', 'Accept-Encoding');
            $response->header('Content-Length', strlen($response->getContent()));
        }

        return $response;
    }
}

