<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable= [
    	'nome',
    	'descricao',
    ];

    public function permissoes()
    {
    	return $this->belongsToMany(Permissao::class);
    }

        public function adicionarPermissao($permissao)
    {
    	return $this->permissoes()->save($permissao); //adiciona o relacionamento chamando a funcao permissoes
    }

         public function removerPermissao($permissao)
    {
    	return $this->permissoes()->detach($permissao); //remove o relacionamento chamando a funcao permissoes, removendo a permissao do papel
    }
}
