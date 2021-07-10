<?php

namespace App\Http\Middleware;

use Closure;


use App\Services\UserAuthService;

class CheckUserData
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
        $userService = new UserAuthService();
        $data = $userService->checkUserFields();
        if($data){
            return $next($request);
        }
        return redirect()->route('accnt_profile');
    }
}
