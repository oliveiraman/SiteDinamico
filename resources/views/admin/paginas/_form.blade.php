
<div class="container">
	<div class="input-field">
		<input type="text" name="titulo" class="validade" value="{{ isset($pagina->titulo) ? $pagina->titulo :'' }}"><!--value="{{ isset($usuario->name)? $usuario->name :'' }}" valida se existe o nome do usuário, se não existir ele substitui por vazio-->
		<label>Título</label>
	</div>
	<div class="input-field">
		<input type="text" name="descricao" class="validade" value="{{ isset($pagina->descricao) ? $pagina->descricao :'' }}"><!--value="{{ isset($usuario->name)? $usuario->name :'' }}" valida se existe o nome do usuário, se não existir ele substitui por vazio-->
		<label>Descrição</label>
	</div>
	@if(isset($pagina->email))
	<div class="input-field">
		<input type="text" name="email" class="validade" value="{{ isset($pagina->email) ? $pagina->email :'' }}"><!--value="{{ isset($usuario->name)? $usuario->name :'' }}" valida se existe o nome do usuário, se não existir ele substitui por vazio-->
		<label>E-mail</label>
	</div>
	@endif
	<div class="input-field">
		<textarea name="texto" class="materialize-textarea">
		{{ isset($pagina->texto)? $pagina->texto :'' }}	
		</textarea>
		<label>Texto</label>
	</div>
	<div class="row">
		<div class="file-field input-field col m6 s12">
			<div class="btn">
				<span>Imagem</span>
				<input type="file" name="imagem">
			</div>
			<div class="file-path-wrapper">
				<input type="text" class="file-path validade">
			</div>
		</div>
		<div class="col m6 s12">
		@if(isset($pagina->imagem))
		<img width="120" src="{{ asset($pagina->imagem) }}">
		@endif
		</div>
	</div>

	<div class="input-field">
		<textarea name="mapa" class="materialize-textarea">
		{{ isset($pagina->mapa)? $pagina->mapa :'' }}	
		</textarea>
		<label>Mapa</label>
	</div>

</div>