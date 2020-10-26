<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Model\Maestro;
use App\Model\Permiso;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('login'));
            }
        }

        $user = Auth::user()->active;

        if($user){
             // return $next($request);


            $route = Route::currentRouteName();
            $maestro =  Maestro::where('ruta',$route)->first();
            $permissions = Permiso::where('idrol', Auth::user()->idrole)->where('idmaestro',$maestro->idpadre)->first();

         

            if($maestro->tipo ==="agregar"){
            
                if ($permissions->agregar === 1) {
                   return $next($request);
                }else{
                   return redirect()->guest(route('home'));
                }

            }


            if($maestro->tipo ==="ver"){
            
                if ($permissions->ver == 1) {
                   return $next($request);
                }else{
                   return redirect()->guest(route('home'));
                }

            }


            if($maestro->tipo ==="editar"){
            
                if ($permissions->editar == 1) {
                   return $next($request);
                }else{
                   return redirect()->guest(route('home'));
                }

            }


            if($maestro->tipo ==="inhabilitar"){
            
                if ($permissions->inhabilitar == 1) {
                   return $next($request);
                }else{
                   return redirect()->guest(route('home'));
                }

            }

            if($maestro->tipo ==="borrar"){
            
                if ($permissions->borrar == 1) {
                   return $next($request);
                }else{
                   return redirect()->guest(route('home'));
                }

            }







        }else{
            Auth::logout();
            return redirect()->guest(route('login'));
        }

    }
}
