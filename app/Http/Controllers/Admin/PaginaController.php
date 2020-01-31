<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//para mandar as variáveis página para view páginas: 
use App\Pagina;

class PaginaController extends Controller
{
    public function index()
    {
    	//script abaixo manda todas as variáveis para view
    	$paginas =Pagina::all();
    	return view('admin.paginas.index', compact('paginas'));

    }


     public function editar($id)
    {
    	//com script abaixo recebo as informações do id da página que o usuário clicou em editar
    	$pagina = Pagina::find($id);
    	return view ('admin.paginas.editar',compact('pagina'));
    	
    }


     public function atualizar(Request $request,$id) //quando for atualizar banco recebe uma requisição....
    {
    	$dados = $request->all();
    	$pagina = Pagina::find($id);
    	$pagina->titulo = trim($dados['titulo']);
    	$pagina->descricao = trim($dados['descricao']);
    	$pagina->texto = trim($dados['texto']);
    	if(isset($dados['email'])){
    	$pagina->email = trim($dados['email']);	
    	}
    	if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
    	$pagina->mapa = trim($dados['mapa']);	
    	}else{
    		$pagina->mapa=null;
    	}    

    	$file = $request->file('imagem');
    	if($file){
    		$rand = rand(11111,99999);
    		$diretorio = "img/paginas/".$id."/";
    		$ext = $file->guessClientExtension();
    		$nomeArquivo = "_img_".$rand.".".$ext;
    		$file->move($diretorio,$nomeArquivo);
    		$pagina->imagem = $diretorio.'/'.$nomeArquivo;
    	}

    	$pagina->update();

    	\Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('admin.paginas');

    }
}
