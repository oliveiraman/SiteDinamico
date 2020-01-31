@extends('layouts.site')

@section('content')

<div class="container">
   <div class="row section">
   		<h3 align="center">Sobre</h3>
   		<div class="divider"></div>
   </div>
   <div class="row section">
   		<div class="col s12 m6">
          <!-- agora fazer um teste utilizando o blade para ver se existe o mapa -->


  
  
            
         @if(isset($pagina->mapa))


         <!-- classe video-container trata video e deixar responsivo a tela -->
         
            <div class="video-container">
         <!--{ !!  !! } ele exipe o iframe com html junto-->     
               {!! $pagina->mapa !!}

            </div>
          @else
            
            <img class="responsive-img" src="{{ asset($pagina->imagem) }}">

          @endif


     

   				
   		</div>
   		<div class="col s12 m6">
   			<h4>{{ $pagina->titulo }}</h4>
   			<blockquote>
   				{{ $pagina->descricao }}
   			</blockquote>
   			<p>{{ $pagina->texto }}</p>
   		</div>
   </div>
    
</div>
@endsection