
<div class="container">
	<div class="input-field">
		<input type="text" name="name" class="validade" value="{{ isset($usuario->name)? $usuario->name :'' }}"><!--value="{{ isset($usuario->name)? $usuario->name :'' }}" valida se existe o nome do usuário, se não existir ele substitui por vazio-->
		<label>Nome</label>
	</div>
	<div class="input-field">
		<input type="text" name="email" class="validade" value="{{ isset($usuario->email)? $usuario->email :'' }}">
		<label>E-mail</label>
	</div>
	<div class="input-field">
		<input type="password" name="password" class="validade">
		<label>Senha</label>
	</div>
</div>