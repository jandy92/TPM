<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class UsersEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $user=Auth::user();
        if($user->can('admin_users')){
            return $next($request);
        }else{
            return redirect()->back();
        }

    }
}
