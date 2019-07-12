<?php

namespace App\Http\Middleware;

use Closure;

class CheckSenha
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
        session_start();
        if(isset($_SESSION['logado'])){
            if($_SESSION['logado'] == true){
                return $next($request);
            }
        }
        return redirect('senha')->with('error', 'Por favor, digite a senha corretamente');
    }
}
