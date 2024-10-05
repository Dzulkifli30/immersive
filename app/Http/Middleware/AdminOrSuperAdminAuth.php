<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOrSuperAdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $verified=Auth::user()->verified;
        $userRole=Auth::user()->role;
        if ($verified == true) {
            if ($userRole==1 || $userRole==2) {
                return $next($request);
            }
            if ($userRole==0) {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('unverified');
        }
        
        
    }
}
