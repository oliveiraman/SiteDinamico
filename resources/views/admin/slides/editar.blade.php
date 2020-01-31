@extends ('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Slide</h2>

 	<div class="row">
 		<nav>
		    <div class="nav-wrapper green">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
		        <a href="{{route('admin.slides')}}" class="breadcrumb">Lista de Slides</a> 
		        <a class="breadcrumb">Editar Slide</a> 
		      </div>
		    </div>
  		</nav>
 	</div>
	
</div>
<div class="row">
	<form action="{{route('admin.slides.atualizar',$registro->id)}}" method="post"  		enctype="multipart/form-data">
		<!--sempre é necessário passar o token do laravel em todas as requisições-->
		{{ csrf_field () }} <!--É um helper do laravel que cria um input com o token para dar segurança ao formulário-->
		<input type="hidden" name="_method" value="put">
		@include('admin.slides._form')

		<div class="container">
			<button class="btn blue">Atualizar</button>
		</div>
	</form>
	
</div>

 



@endsection