<?php 

class Paginas extends Controller{

	public function index(){
		if(Sessao::estaLogado()):
			URL::redirecionar('posts');
		endif;

		$dados = [
			'titulo'=> 'Página Inicial',
		];

		$this->view('paginas/home',$dados);
	}

	public function sobre(){
		$dados = [
			'tituloPagina'=> 'Página sobre nós',
		];

		$this->view('paginas/sobre',$dados);
	}
/*
	public function login(){
		$dados = [
			'tituloLogin'=> 'Faça seu Login',
		];

		$this->view('paginas/login',$dados);
	}
*/
}