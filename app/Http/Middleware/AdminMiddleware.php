<?php

namespace App\Http\Middleware;

use Closure;

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
        $user = \Auth::User();
        if(!$user || $user->role_id != 2) {
            $data['status'] = 404;
            return \Response::json($data);
        }
        return $next($request);
    }
}
