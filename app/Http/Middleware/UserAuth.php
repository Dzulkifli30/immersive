<?php

namespace App\Http\Middleware;

use App\Models\Biodata;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
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
        $userId = Auth::user()->id;

        $biodataExists = Biodata::where('user_id', $userId)->exists();
        
        if ($verified == false) {
            return redirect()->route('unverified');
            
        }
        if (!$biodataExists) {
            return redirect()->route('biodata.create');   
        }
        
        if ($userRole==0) {
            return $next($request);
        }
        if ($userRole==2) {
            return redirect()->route('super.dashboard');
        }
        if ($userRole==1) {
            return redirect()->route('admin.dashboard');
        }
        
    }
}
