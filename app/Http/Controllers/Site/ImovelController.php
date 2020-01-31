<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imovel;


class ImovelController extends Controller
{
     public function index($id)
    {
    	$imovel = Imovel::find($id);
    	$galeria = $imovel->galeria()->orderBy('ordem')->get();
    	$direcaoImagem = ['center-align','left-align','rigth-align'];


    	$seo=[

			'titulo'=>$imovel->titulo,
			'descricao'=>$imovel->descricao,//descricao máximo 165 caracteres
			'imagem'=>asset($imovel->imagem),
			'url'=>route('site.imovel',[$imovel->id,$imovel->getSlug()])


    	];


    	return view('site.imovel',compact('imovel','galeria','direcaoImagem','seo'));
    }
}
