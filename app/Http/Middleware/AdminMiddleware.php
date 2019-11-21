<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$this->authorize('create', Article::class);
        //Can I possibly using policies in middlware,
        //If so, then what's the point?
        //Maybe it just better to use policy

        if (Auth::user()->email === "admin@admin") {
            return $next($request);
        }
        //return response("Not Allowed");
        return response()->view('errors.adminFail');


        return $next($request);
    }
}
