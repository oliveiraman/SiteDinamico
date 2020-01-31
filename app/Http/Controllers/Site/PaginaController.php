<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pagina; //pegar o model criado

class PaginaController extends Controller
{
    public function sobre()
    {
    	//o select vai retornar todas as paginas do tipo sobre e o first(); é uma método do laravel que retorna o primeiro elemento da lista de registros
    	$pagina = Pagina::where('tipo','=','sobre')->first();
    	//dd($pagina);

    	// enviar os valores da tabela para a view
    	return view('site.sobre',compact('pagina'));
    }

        public function contato()
    {
    	//o select vai retornar todas as paginas do tipo contato e o first(); é uma método do laravel que retorna o primeiro elemento da lista de registros
    	$pagina = Pagina::where('tipo','=','contato')->first();
    	//dd($pagina);

    	// enviar os valores da tabela para a view
    	return view('site.contato',compact('pagina'));
    }

    public function enviarContato(Request $request)
    {
    	$pagina = Pagina::where('tipo','=','contato')->first();
    	$email = $pagina->email;

    	\Mail::send('emails.contato',['request'=>$request],
    		function($m) use($request,$email){
    			$m->from($request['email'], $request['nome']);
    			$m->replyTo($request['email'], $request['nome']);
    			$m->subject("Contato pelo Site");
    			$m->to($email, 'Contato do Site');
    		});

		\Session::flash('mensagem',['msg'=>'Contato Enviado com sucesso!','class'=>'green white-text']);

    	return redirect()->route('site.contato');
    }
}

