<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //もしログインユーザーが「admin」なら、リクエストを実行する
        if(auth()->user()->role == 'admin') {
          return $next($request);
        }
        //adminではなければ、dashboardへ移動させる
        return redirect()->route('dashboard');
    }
}
