<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        // dd($levels);
        if($request->user() != null) {
            $levelLocal = '';
            switch ($request->user()->level) {
                case "admin":
                    $levelLocal = 'admin';
                    break;
                default:
                    $levelLocal = 'customer';
                    break;
            }
            if(in_array($levelLocal, $levels)) {
                return $next($request);
            }
        }
        
        return redirect('/login');
    }
}
