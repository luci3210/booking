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
        return response("Fill up your profile data", 403);
        // abort(403, 'Access denied');
        // abort( response()->json('Unauthorized ', 403) );

    }
}
