<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Galeria;
use App\Imovel;
use Illuminate\Support\Str;

class GaleriaController extends Controller
{
        public function index($id)
    {
        $imovel = Imovel::find($id);

        $registros = $imovel->galeria()->orderBy('ordem')->get();
        //função dd semelhante ao vardump do php e já possui função exit
     


        //ele vai passar variável $usuarios em forma de array para utilizar na view
        return view('admin.galerias.index',compact('registros','imovel'));
    }

    public function adicionar($id)
    {
        
        $imovel = Imovel::find($id);

        return view('admin.galerias.adicionar', compact('imovel'));
    }

    public function salvar(Request $request,$id)
    {
        $imovel = Imovel::find($id);
        $dados = $request->all();

        if($imovel->galeria()->count()){
        	$galeria = $imovel->galeria()->orderBy('ordem','desc')->first();
        	$ordemAtual = $galeria->ordem;
        }else{
        	$ordemAtual = 0;
        }

        if($request->hasFile('imagens')){
        	$arquivos = $request->file('imagens');
        	foreach ($arquivos as $imagem) {
				$registro = new Galeria();

	        	$rand = rand(11111,99999);
	    		$diretorio = "img/imoveis/".Str::slug($imovel->titulo,'_')."/";
	    		$ext = $imagem->guessClientExtension();
	    		$nomeArquivo = "_img_".$rand.".".$ext;
	    		$imagem->move($diretorio,$nomeArquivo);
	    		$registro->imovel_id = $imovel->id;
	    		$registro->ordem = $ordemAtual+1;
	    		$ordemAtual++;
	    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
        		$registro->save();                		


        	}
        }

                              
         \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.galerias',$imovel->id);
    }




    public function editar($id)
    {
        
        $registro = Galeria::find($id);
        $imovel = $registro->imovel;



        return view('admin.galerias.editar', compact('registro','imovel'));


        
    }

     public function atualizar(Request $request,$id)
    {
        $registro = Galeria::find($id);
        $dados = $request->all();
    	
    	$registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->ordem = $dados['ordem'];

        $imovel = $registro->imovel;
      

        $file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/imoveis/".Str::slug($imovel->titulo,'_')."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$registro->imagem = $diretorio.'/'.$nomeArquivo;
    	}



        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.galerias',$imovel->id);
    }

       public function deletar($id)
    {

        $galeria = Galeria::find($id);
        $imovel = $galeria->imovel;

        $galeria->delete();

        //sistema laravel, sistema eloquent implementa mais facilmente
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
          return redirect()->route('admin.galerias',$imovel->id);
    }
}
