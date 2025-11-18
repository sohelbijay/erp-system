<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    public function handle(Request $request, Closure $next)
    {
        
        //info('SESSION IN MIDDLEWARE: ', $request->session()->all());
       
        // যদি session এ user info না থাকে → redirect to login
        if (!$request->session()->has('user')) {
            return redirect()->route('login');
        }


        // Process request
        $response = $next($request);

        // Prevent caching
        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }
}
