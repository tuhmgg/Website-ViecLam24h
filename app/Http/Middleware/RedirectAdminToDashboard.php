<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdminToDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->user_type === 'admin') {
            // Loại trừ các route xác thực và logout
            $excluded = [
                'logout', 'login', 'register', 'password*', 'email*', 'verify*', 'api/*'
            ];
            foreach ($excluded as $pattern) {
                if ($request->is($pattern)) {
                    return $next($request);
                }
            }
            // Nếu không phải route admin/* thì redirect
            if (! $request->is('admin*')) {
                return redirect()->route('admin.dashboard');
            }
        }
        return $next($request);
    }
}
