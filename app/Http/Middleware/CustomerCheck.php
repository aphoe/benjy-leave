<?php

namespace App\Http\Middleware;

use Closure;

class CustomerCheck
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
        $host = $request->getHost();
        if($host === env('APP_BASE_URL')){
            abort(403);
        }
        return $next($request);
    }
}
