
<div class="container">
	<div class="input-field">
		<input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo)? $registro->titulo :'' }}"><!--value="{{ isset($usuario->name)? $usuario->name :'' }}" valida se existe o nome do usuário, se não existir ele substitui por vazio-->
		<label>Título</label>
	</div>
</div>