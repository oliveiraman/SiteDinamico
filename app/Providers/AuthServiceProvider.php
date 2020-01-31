<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Permissao;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate::define('listar-usuarios',
            //function($user,$permissao){

                //return true == $permissao ; 

           // });
        
        foreach ($this->getPermissoes() as $permissao) {
            
            Gate::define($permissao->nome,
                function($user) use ($permissao){
                    return $user->existePapel($permissao->papeis) 
                        || $user->existeAdmin();


                }
            );
        }


    }

    public function getPermissoes() //retorna todas as permissoes que tem relacionamentos com papeis
    {
        return Permissao::with('papeis')->get();
    }


}
