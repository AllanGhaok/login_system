<?php
class Usuarios extends Controller {

	public function __construct(){
		$this->usuarioModel = $this->model('Usuario');
	}

	public function cadastrar(){
		$formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($formulario)):
			$dados = [
				'nome' => trim($formulario['nome']),
				'email' => trim($formulario['email']),
				'senha' => trim($formulario['senha']),
				'confirmar_senha' => trim($formulario['confirmar_senha']),
			];

			if(in_array("", $formulario)):
				if(empty($formulario['nome'])):
					$dados['nome_erro'] = 'Preencha o campo Nome.';
				endif;

				if(empty($formulario['email'])):
					$dados['email_erro'] = 'Preencha o campo E-mail.';
				endif;

				if(empty($formulario['senha'])):
					$dados['senha_erro'] = 'Preencha o campo Senha.';
				endif;

				if(empty($formulario['confirmar_senha'])):
					$dados['confirmar_senha_erro'] = 'Confirme a Senha.';
				endif;
			else:
				if(Checa::checarNome($formulario['nome'])):
					$dados['nome_erro'] = 'Nome informado é inválido.';
				elseif(Checa::checarEmail($formulario['email'])):
					$dados['email_erro'] = 'O E-mail informado é invalido';

				elseif($this->usuarioModel->checarEmail($formulario['email'])):
					$dados['email_erro'] = 'O E-mail informado já esta cadastrado.';
				elseif(strlen($formulario['senha']) < 6):
					$dados['senha_erro'] = 'A senha deve ter no minimo 6 caracteres.';
				elseif($formulario['senha'] != $formulario['confirmar_senha']):
					$dados['confirmar_senha_erro'] = 'As senhas são diferentes.';
				else:
					$dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

					if($this->usuarioModel->armazenar($dados)):
						echo 'Cadastro realizado com sucesso.<hr>';
					else:
						die("Erro ao realizar cadastro ao banco de dados.");
					endif;
				endif;
			endif;

			var_dump($formulario);

		else:
			$dados = [
				'nome' => '',
				'email' => '',
				'senha' => '',
				'confirmar_senha' => '',
				'nome_erro' => '',
				'email_erro' => '',
				'senha_erro' => '',
				'confirmar_senha_erro' => '',
			];
		endif;
		
		$this->view('usuarios/cadastrar', $dados);
	}

	public function login(){
		$formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($formulario)):
			$dados = [
				'email' => trim($formulario['email']),
				'senha' => trim($formulario['senha']),
			];

			if(in_array("", $formulario)):
				if(empty($formulario['email'])):
					$dados['email_erro'] = 'Preencha o campo E-mail.';
				endif;

				if(empty($formulario['senha'])):
					$dados['senha_erro'] = 'Preencha o campo Senha.';
				endif;
			else:
				if(Checa::checarEmail($formulario['email'])):
					$dados['email_erro'] = 'O E-mail informado é invalido';
				
				else:
					$usuario = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);

					if($usuario):
						var_dump($usuario);
						echo '<hr>';
					else:
						echo 'Usuario ou senha invalidos.<hr>';
					endif;
				endif;
			endif;
			var_dump($formulario);
		else:
			$dados = [
				'email' => '',
				'senha' => '',
				'email_erro' => '',
				'senha_erro' => '',
			];
		endif;
		
		$this->view('usuarios/login', $dados);
	}
}