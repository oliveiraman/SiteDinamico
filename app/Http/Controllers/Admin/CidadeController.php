<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cidade;
use App\Imovel;

class CidadeController extends Controller
{
   public function index()
    {
        $registros = Cidade::all();
        //função dd semelhante ao vardump do php e já possui função exit
        //dd($usuarios);

        //ele vai passar variável $usuarios em forma de array para utilizar na view
        return view('admin.cidades.index',compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.cidades.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new Cidade();
        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->sigla_estado = $dados['sigla_estado'];
                      
        $registro->save(); //método save()irá salvar os registros no banco de dados.

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.cidades');
    }

    public function editar($id)
    {
        $registro = Cidade::find($id);
        return view('admin.cidades.editar', compact('registro'));//enviando variavel registro que contem o id lá para view usuarios.editar
    }

     public function atualizar(Request $request,$id)
    {
        $registro = Cidade::find($id);
        $dados = $request->all();
        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->sigla_estado = $dados['sigla_estado'];
        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.cidades');
    }

       public function deletar($id)
    {
        if(Imovel::where('cidade_id','=',$id)->count()){

        $msg = "Não é possível deletar essa cidade! Esses imóveis(";
        $imoveis = Imovel::where('cidade_id','=',$id)->get();

        foreach ($imoveis as $imovel) {
        	$msg.="id:".$imovel->id." ";
        }
        $msg .= ") estão relacionados.";


        \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);
          return redirect()->route('admin.cidades');

        }


        Cidade::find($id)->delete(); 

        //sistema laravel, sistema eloquent implementa mais facilmente
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
          return redirect()->route('admin.cidades');
    }
}
