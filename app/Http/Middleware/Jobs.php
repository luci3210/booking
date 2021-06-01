<?php

namespace App\Http\Middleware;

use Closure;

class Jobs
{

    public function handle($request, Closure $next)
    {
        if($request->user() === null) {

            return abort(403, 'Unauthorized action.'); 
        }

        $doAction = $request->route()->getAction();

        $jobs = isset($doAction['jobs']) ? $doAction['jobs'] : null;

        if($request->user()->hasJob($jobs) || !$jobs) {

            return $next($request);
        }

         return abort(403, 'Unauthorized action.'); 
    }
}