@extends ('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Usuário</h2>

 	<div class="row">
 		<nav>
		    <div class="nav-wrapper green">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
		        <a href="{{route('admin.usuarios')}}" class="breadcrumb">Lista de Usuários</a> 
		        <a class="breadcrumb">Adicionar Usuário</a> 
		      </div>
		    </div>
  		</nav>
 	</div>
	
</div>
<div class="row">
	<form action="{{route('admin.usuarios.salvar')}}" method="post">
		<!--sempre é necessário passar o token do laravel em todas as requisições-->
		{{ csrf_field () }} <!--É um helper do laravel que cria um input com o token para dar segurança ao formulário-->
		@include('admin.usuarios._form')

		<div class="container">
			<button class="btn blue">Adicionar</button>
		</div>
	</form>
	
</div>

 



@endsection