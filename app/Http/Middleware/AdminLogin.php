<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            if(Auth::user()->is_admin == "1"){
                if (Auth::user()->is_banned != 1) {
                    return $next($request);
                } else {
                    $error = "You are banned from website, please contact with moderator";
                    return Redirect::route('admin.index')->withErrors($error);
                }
            }else{
                $error = "You need to have admin role";
                return Redirect::route('admin.index')->withErrors($error);
            }
        }else{
            $error = "Login first";
            return Redirect::back()->withErrors($error);
        }
    }
}
