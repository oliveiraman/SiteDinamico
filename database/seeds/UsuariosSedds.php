<?php

use Illuminate\Database\Seeder;
use App\User; //utiliza o modelo de banco para criar novo usuário

class UsuariosSedds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(User::where('email','=','oliveiraman@gmail.com')->count()){
            $usuario = User::where('email','=','oliveiraman@gmail.com')->first();
            $usuario->name = "André Tadeu";
            $usuario->email = "oliveiraman@gmail.com";
            $usuario->password = Hash::make("123456");
            $usuario->save();
        }else{

            $usuario = new User();
            $usuario->name = "André Tadeu";
            $usuario->email = "oliveiraman@gmail.com";
            $usuario->password = Hash::make("123456");
            $usuario->save();


        }

        

    }
}
