<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{
    public function index()
    {
        $registros = Tipo::all();
        //função dd semelhante ao vardump do php e já possui função exit
        //dd($usuarios);

        //ele vai passar variável $usuarios em forma de array para utilizar na view
        return view('admin.tipos.index',compact('registros'));
    }

    public function adicionar()
    {
        return view('admin.tipos.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new Tipo();
        $registro->titulo = $dados['titulo'];
                      
        $registro->save(); //método save()irá salvar os registros no banco de dados.

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.tipos');
    }

    public function editar($id)
    {
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));//enviando variavel registro que contem o id lá para view usuarios.editar
    }

     public function atualizar(Request $request,$id)
    {
        $registro = Tipo::find($id);
        $dados = $request->all();
 		$registro->titulo = $dados['titulo'];

        $registro ->update();
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.tipos');
    }

       public function deletar($id)
    {


        if(Imovel::where('tipo_id','=',$id)->count()){

        $msg = "Não é possível deletar esse tipo de imóvel! Esses imóveis(";
        $imoveis = Imovel::where('tipo_id','=',$id)->get();

        foreach ($imoveis as $imovel) {
            $msg.="id:".$imovel->id." ";
        }
        $msg .= ") estão relacionados.";


        \Session::flash('mensagem',['msg'=>$msg,'class'=>'red white-text']);
          return redirect()->route('admin.tipos');

        }


        Tipo::find($id)->delete(); 
        //sistema laravel, sistema eloquent implementa mais facilmente
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
          return redirect()->route('admin.tipos');
    }
}
