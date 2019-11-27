<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfPasswordSet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//
//    private function isSetPassword($user){
//        if ($user->email_verified_at == null){
//            return false;
//        }else
//            return true;
//    }

    public function handle($request, Closure $next)
    {
        if (Auth::check() && is_null(Auth::user()->email_verified_at)){
//            dd(Auth::user());
            return redirect('set-password');
        }
        return $next($request);
    }
}
