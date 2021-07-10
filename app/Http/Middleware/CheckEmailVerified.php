<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\UserAuthService;

class CheckEmailVerified
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
        $data = $userService->checkEmail();
        if($data){
            return $next($request);
        }
        return response("Please Verify Your Email", 403);
    }
}
