<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = env('ADMIN_EMAIL');
        if (auth()->user()->email == $email) {
            return $next($request);
        }
        return response([
            "status" => false,
            "message" => "Unauthorized",
        ], 403);
    }
}
