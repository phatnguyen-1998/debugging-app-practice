<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info(" request received ", [
            'method' => $request->method(),
            'url' => $request->url(),
            'insert' => $request->all()
        ]);
        $response = $next($request);
        \log::info('request sent', ['status' => $response->status()]);
        return $response;
    }
}
