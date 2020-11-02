<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompanyUpdated
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request->url(), url('setting/company/edit'));
        if(\Auth::check() && \Auth::user()->can('settings-super-admin', 'settings-admin')){
            if(!companyField('updated') && $request->url() !== url('setting/company/edit')){
                return redirect('setting/company/edit')->with('theme-info', 'Please update company information before proceeding with any other business.');
            }
        }
        return $next($request);
    }
}
