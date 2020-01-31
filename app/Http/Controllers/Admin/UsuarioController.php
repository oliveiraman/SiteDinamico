<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
    	$dados = $request-> all();
    	
    	if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){

    		\Session::flash('mensagem',['msg'=>'Login realizado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....
    		
    		return redirect()->route('admin.principal');
    	} //vai retornar true ou false

		\Session::flash('mensagem',['msg'=>'Erro! confira seus dados.','class'=>'red white-text']);//mandar mensagem nas telas....

			
			return redirect()->route('admin.login');

    	//dd($dados); verificar se está chegando os dados
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index()
    {

//trabalhando permissões se o usuario tem ou não permissão dentro do sistema
        if (auth()->user()->can('usuario_listar')){
                    $usuarios = User::all();
        //função dd semelhante ao vardump do php e já possui função exit
        //dd($usuarios);

        //ele vai passar variável $usuarios em forma de array para utilizar na view
        return view('admin.usuarios.index',compact('usuarios'));
        }else{
        return redirect()->route('admin.principal');
        }





//----------------------------



    }

    public function adicionar()
    {
        //dd (auth()->user()->can('usuario_adicionar'));
        if (!auth()->user()->can('usuario_adicionar')){
            return redirect()->route('admin.principal');
        }

        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {

        if (!auth()->user()->can('usuario_adicionar')){

            return redirect()->route('admin.principal');
        }


        $dados = $request->all();

        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
               
        $usuario->save(); //método save()irá salvar os registros no banco de dados.

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.usuarios');
    }
    public function editar($id)
    {
        if (!auth()->user()->can('usuario_editar')){
        return redirect()->route('admin.principal');
        }


        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));//enviando variavel usuario que contem o id lá para view usuarios.editar
    }
    public function atualizar(Request $request,$id)
    {

        if (!auth()->user()->can('usuario_editar')){
        return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        $dados = $request->all();
        //valida e a senha tem mais de 5 caracteres, se não tiver remove a senha para não atualizar a senha anterior da pessoa
        if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password']=bcrypt($dados['password']);

        }else{
            unset($dados['password']);
        }

        //vai atualizar todos os dados do usuário no banco de dados e se a senha tiver menos de 6 caracteres vai manter a que já estava lá
        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']); //mandar mensagem nas telas....

        return redirect()->route('admin.usuarios');
    }

    public function deletar($id)
    {

        if (!auth()->user()->can('usuario_deletar')){
        return redirect()->route('admin.principal');
        }
        User::find($id)->delete(); 
        //sistema laravel, sistema eloquent implementa mais facilmente
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
          return redirect()->route('admin.usuarios');
    }

    public function papel($id)
    {
        $usuario = User::find($id);
        $papel = Papel::all();
        return view('admin.usuarios.papel',compact('usuario','papel'));
    }

    public function salvarPapel(Request $request, $id)
    {
        $usuarios = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuarios->adicionaPapel($papel);
        return redirect()->back();
    }

    public function removerPapel($id,$papel_id)
    {
        $usuarios = User::find($id);
        $papel = Papel::find($papel_id);
        $usuarios->removePapel($papel);
        return redirect()->back();
    }


}
