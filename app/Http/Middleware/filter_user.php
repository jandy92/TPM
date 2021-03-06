<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class filter_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::user()->hasRole('user')){
            return $next($request);
        }else{
            $request->session()->flash('mensaje',['title'=>'Error!','text'=>'No tiene permisos suficientes.Ha sido redireccionado.']);
            return redirect('/');
        }
    }
}
