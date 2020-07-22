<div class="col-x1-4 col-md-6 col-lg-4 mx-auto p-5">
	<div class="card">
		<div class="card-header bg-secondary text-white">
			<h4>Entrar</h4>
		</div>
		<div class="card-body">
			<p class="card-text"><small class="text-muted">Entre com o seu Login e Senha</small></p>
			<form name="login" method="POST" action="<?=URL?>/usuarios/login">
				<div class="form-group">
					<label for="email">Email: <sup class="text-danger">*</sup></label>
					<input type="email" name="email" id="email" value = "<?=$dados['email']?>" class="form-control <?=$dados['email_erro'] ? 'is-invalid' : ''?>" >
					<div class="invalid-feedback">
						<?=$dados['email_erro']?>
					</div>
				</div>
				<div class="form-group">
					<label for="senha">Senha: <sup class="text-danger">*</sup></label>
					<input type="password" name="senha" id="senha" value = "<?=$dados['senha']?>" class="form-control <?=$dados['senha_erro'] ? 'is-invalid' : ''?>" >
					<div class="invalid-feedback">
						<?=$dados['senha_erro']?>
					</div>
				</div>
				
				<div class="row">
					<div class="col">
						<input type="submit" value="Fazer Login" class="btn btn-info btn-block">
					</div>
					<div class="col">
						<a href="<?=URL?>/usuarios/cadastrar">Você não tem uma conta? Cadastre-se já!</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>