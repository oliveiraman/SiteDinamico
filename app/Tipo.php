<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
        public function imoveis()//funcao para definir relacionamento no modelo
    {
    	return $this->hasMany('App\Imovel','tipo_id');
    }

}
