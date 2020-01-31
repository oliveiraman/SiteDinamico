<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Imovel extends Model
{
    protected $table="imoveis";

    public function tipo()//funcao para definir relacionamento no modelo
    {
    	return $this->belongsTo('App\Tipo','tipo_id');
    }

    public function cidade()//funcao para definir relacionamento no modelo
    {
    	return $this->belongsTo('App\Cidade','cidade_id');
    }

    public function galeria()
    {
    	return $this->hasMany('App\Galeria','imovel_id');
    }

    public function getSlug() {
        return $this->titulo ? Str::slug($this->titulo, '_') : '';
    }
}
