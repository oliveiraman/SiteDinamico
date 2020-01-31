<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
        public function imoveis()//funcao para definir relacionamento no modelo
    {
    	return $this->hasMany('App\Imovel','cidade_id');
    }

}
