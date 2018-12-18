<?php

namespace App\Http\Middleware;

use Closure;
use App\TokenApi;
use Request;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private $publicRoutes = ['login'];

    public function handle($request, Closure $next)
    {
        if(in_array(array_reverse(explode("/",$_SERVER['REQUEST_URI']))[0], $this->publicRoutes)) return $next($request);
        session_start();
        
        if(isset($_SESSION['User']['logado']) && $_SESSION['User']['logado'] == 'S'){
            return $next($request);           
        }else{
            return redirect('login');
        } 
    }
}