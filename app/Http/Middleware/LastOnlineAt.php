<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use DB;

class LastOnlineAt
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
        if (auth()->guest()) {
            return $next($request);
        }
        if (auth()->user()->last_online_at === null || auth()->user()->last_online_at->diffInHours(now()) !==0)
        {
            $connection = 'system';
            if(isCustomer()){
                $connection = 'tenant';
            }
            DB::connection($connection)
                ->table('users')
                ->where('id', auth()->user()->id)
                ->update(['last_online_at' => Carbon::now()]);
        }
        return $next($request);
    }
}
