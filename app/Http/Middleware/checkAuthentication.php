<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // if($request->user()->role!==$role){
        //     if($request->user()->role=='admin')
        //         {
        //             return redirect()->route('admins.dashboard');
        //         }else
        //         {
        //             return redirect()->route('posts')->withErrors(['You are not authorized to access this page']);
        //         }
        // }

        if($request->url('admin/login'))
        {
            if(isset(Auth::guard('admin')->user()->name))
            {
                return redirect()->route('admins.dashboard');

            }

        }
        return $next($request);

        // if(auth()->user()->role=='admin')
        // {
        //     return redirect()->route('admins.dashboard');


        // }else{
        //     return $next($request);
        // }

    }
}
