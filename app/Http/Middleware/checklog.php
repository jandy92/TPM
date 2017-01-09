<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class checklog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $error=0;
        if(Auth::check()&&Auth::user()->activado==1){
            return $next($request);           
        }
        else{
            if(Auth::check()&&Auth::user()->activado==0){
                $error=1;
            }
            Auth::logout();
            Session::flush();
            if($error>0){
                $err=['title'=>'','text'=>''];
                switch ($error) {
                    case 1:
                        $err['title']='Activar cuenta.';
                        $err['text']='Antes de ingresar por primera vez, debe activar su cuenta. Revise su correo electrónico o contactese con el administrador.';
                        break;
                    
                    default:
                        $err['title']='Error desconocido.';
                        $err['text']='Ha ocurrido un error al checkear este usuario y se desconoce la cusa. Por favor contactese con el administrador e informe de este problema.';
                        break;
                }
                return redirect('/login')->with('mensaje',$err);
            }else{
                return redirect('/login');
            }
        }
    }
}