<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            /*ALTERAR A ROTA PARA CASO A PESSOA NÃO ESTEJA AUTENTIFACA SER REDIRECIONADA PARA TELA DE LOGIN*/
            return route('admin.login');
        }
    }
}
