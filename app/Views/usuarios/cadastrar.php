<div class="col-x1-4 col-md-6 col-lg-4 mx-auto p-5">
	<div class="card">
		<div class="card-header bg-secondary text-white">
			<h4>Cadastre-se</h4>
		</div>
		<div class="card-body">
			<p class="card-text"><small class="text-muted">Preencha o formulário abaixo para fazer ser cadastro</small></p>
			<form name="cadastrar" method="POST" action="<?=URL?>/usuarios/cadastrar">
				<div class="form-group">
					<label for="nome">Nome: <sup class="text-danger">*</sup></label>
					<input type="text" name="nome" id="nome" value = "<?=$dados['nome']?>" class="form-control <?=$dados['nome_erro'] ? 'is-invalid' : ''?>">
					<div class="invalid-feedback">
						<?=$dados['nome_erro']?>
					</div>
				</div>
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
				<div class="form-group">
					<label for="confirmar_senha">Confirme a senha: <sup class="text-danger">*</sup></label>
					<input type="password" name="confirmar_senha" id="confirmar_senha" value = "<?=$dados['confirmar_senha']?>" class="form-control <?=$dados['confirmar_senha_erro'] ? 'is-invalid' : ''?>" >
					<div class="invalid-feedback">
						<?=$dados['confirmar_senha_erro']?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<input type="submit" value="Cadastrar" class="btn btn-info btn-block">
					</div>
					<div class="col-md-6">
						<a href="<?=URL?>/usuarios/login">Você tem uma conta? Faça seu login.</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>