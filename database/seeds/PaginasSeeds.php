<?php

use Illuminate\Database\Seeder;
use App\Pagina;


class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo','=','sobre')->count();
        //dd ($existe); --ele apenas vai exibir quantidade de registros na tela é necessário rodar o mesmo comando para criação no console php artisan db:seed --class=PaginasSeeds
        

        if($existe){//if compara se existe um registro, caso exista ele apenas atualiza os dados, senão ele cria
        	$paginaSobre = Pagina::where('tipo','=','sobre')-> first();

        }else{
			$paginaSobre = new Pagina();
        }
        //para dar select no conteudo do campo criado dd($paginaSobre->titulo);
        //php artisan db:seed --class=PaginasSeeds
        
         $paginaSobre->titulo="A empresa ";
         $paginaSobre->descricao="Descrição breve sobre a empresa";
         $paginaSobre->texto="Texto Sobre a empresa";
         $paginaSobre->imagem="img/modelo_img_home.jpg";
         $paginaSobre->mapa='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d456.8999604595017!2d-46.60111404104076!3d-23.63301885068246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5b5d73d37f1b%3A0xe36f2f1301da6ccb!2sR.%20Maria%20Teresa%20Gaudino%20-%20Jardim%20Maria%20Estela%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1570033893019!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';
         $paginaSobre->tipo="sobre";
         $paginaSobre->save(); //método save salva as informações
         echo "Página Sobre criada com sucesso";

         //---------------------------------------------------

         $existe = Pagina::where('tipo','=','contato')->count();
        //dd ($existe); --ele apenas vai exibir quantidade de registros na tela é necessário rodar o mesmo comando para criação no console php artisan db:seed --class=PaginasSeeds
        

        if($existe){//if compara se existe um registro, caso exista ele apenas atualiza os dados, senão ele cria
            $paginacontato = Pagina::where('tipo','=','contato')-> first();

        }else{
            $paginacontato = new Pagina();
        }
        //para dar select no conteudo do campo criado dd($paginacontato->titulo);
        //php artisan db:seed --class=PaginasSeeds
        
         $paginacontato->titulo="Entre em contato";
         $paginacontato->descricao="Preencha o formulário";
         $paginacontato->texto="Contato";
         $paginacontato->imagem="img/modelo_img_home.jpg";
         $paginacontato->email="oliveiraman@gmail.com";
         $paginacontato->tipo="contato";
         $paginacontato->save(); //método save salva as informações
         echo "Página Contato criada com sucesso";
    }
}
