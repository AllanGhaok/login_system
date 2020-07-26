<?php
//Responsavel por fazer a postagem propriamente dita no site.
class Posts extends Controller {

	public function __construct(){
		if(!Sessao::estaLogado()):
			URL::redirecionar('usuarios/login');
		endif;

		$this->postModel = $this->model('Post');
		$this->usuarioModel = $this->model('Usuario');
	}

	public function index(){

		$dados = [
			'posts' => $this->postModel->lerPosts()
		];

		$this->view('posts/index', $dados);
	}

	public function cadastrar(){
		$formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($formulario)):
			$dados = [
				'titulo' => trim($formulario['titulo']),
				'texto' => trim($formulario['texto']),
				'usuario_id' => $_SESSION['usuario_id']
			];

			if(in_array("", $formulario)):
				if(empty($formulario['titulo'])):
					$dados['titulo_erro'] = 'Preencha o campo Titulo.';
				endif;

				if(empty($formulario['texto'])):
					$dados['texto_erro'] = 'Preencha o campo Texto.';
				endif;
			else:
				if($this->postModel->armazenar($dados)):
						Sessao::mensagem('post', 'Post cadastrado com sucesso.');
						URL::redirecionar('posts');
					else:
						die("Erro ao realizar post no banco de dados.");
					endif;
			endif;
		
		else:
			$dados = [
				'titulo' => '',
				'texto' => '',
				'titulo_erro' => '',
				'texto_erro' => '',
			];
		endif;
		
		$this->view('posts/cadastrar', $dados);
	}

	public function editar($id){
		$formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($formulario)):
			$dados = [
				'id' => $id, //antes era: trim($formulario[$id])
				'titulo' => trim($formulario['titulo']),
				'texto' => trim($formulario['texto'])
			];

			if(in_array("", $formulario)):
				if(empty($formulario['titulo'])):
					$dados['titulo_erro'] = 'Preencha o campo Titulo.';
				endif;

				if(empty($formulario['texto'])):
					$dados['texto_erro'] = 'Preencha o campo Texto.';
				endif;
			else:
				if($this->postModel->atualizar($dados)):
						Sessao::mensagem('post', 'Post atuzlizado com sucesso.');
						URL::redirecionar('posts');
					else:
						die("Erro ao atualizar o post.");
					endif;
			endif;
		
		else:
			$post = $this->postModel->lerPostPorId($id);
			
			if ($post->usuario_id != $_SESSION['usuario_id']):
				Sessao::mensagem('post', 'Você não tem autorização para fazer alterações neste post.', 'alert alert-danger');
				URL::redirecionar('posts');
			endif;

			$dados = [
				'id' => $post->id,
				'titulo' => $post->titulo,
				'texto' => $post->texto,
				'titulo_erro' => '',
				'texto_erro' => '',
			];
		endif;
		
		$this->view('posts/editar', $dados);
	}

	public function ver($id){
		$post = $this->postModel->lerPostPorId($id);
		$usuario = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);

		$dados = [
			'post' => $post,
			'usuario' => $usuario
		];

		$this->view('posts/ver', $dados);
	}

	public function deletar($id){
		$id = (int) $id;

		if(is_int($id)):
			if($this->postModel->destruir($id)):
				Sessao::mensagem('post', 'Post deletado com sucesso.');
				URL::redirecionar('posts');
			else:
				die("Erro ao tentar apagar o post.");
			endif;
		endif;
	}
}