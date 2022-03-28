<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Player
{
    /**
     * Handle an incoming request.
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'scout') {
            return redirect()->route('scout');
        }
        if (Auth::user()->role == 'player') {
            return $next($request);
        }
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }
    }
}
