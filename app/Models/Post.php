<?php 
//Responsavel em conectar com o banco de dados e fazer comandos especificos para ele, para manipulação das postagens.
class Post {
	private $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function lerPosts(){
		$this->db->query("SELECT *, 
		tb_posts.id as postId, 
		tb_posts.criado_em as postDataCadastro, 
		tb_usuarios.id as usuarioId, 
		tb_usuarios.criado_em as usuarioDataCadastro 
		FROM tb_posts 
		INNER JOIN tb_usuarios ON 
		tb_posts.usuario_id = tb_usuarios.id
		ORDER BY tb_posts.id DESC");
		return $this->db->resultados();
	}

	public function armazenar($dados){
		$this->db->query("INSERT INTO tb_posts (usuario_id, titulo, texto) VALUES (:usuario_id, :titulo, :texto)");

		$this->db->bind("usuario_id", $dados['usuario_id']);
		$this->db->bind("titulo", $dados['titulo']);
		$this->db->bind("texto", $dados['texto']);

		if($this->db->executa()):
			return true;
		else:
			return false;
		endif;
	}

	public function atualizar($dados){
		$this->db->query("UPDATE tb_posts SET titulo = :titulo, texto = :texto WHERE id = :id");

		$this->db->bind("id", $dados['id']);
		$this->db->bind("titulo", $dados['titulo']);
		$this->db->bind("texto", $dados['texto']);

		if($this->db->executa()):
			return true;
		else:
			return false;
		endif;
	}

	public function lerPostPorId($id){
		$this->db->query("SELECT * FROM tb_posts WHERE id = :id");
		$this->db->bind('id', $id);

		return $this->db->resultado();
	}

	public function destruir($id){
		$this->db->query("DELETE FROM tb_posts WHERE id = :id");
		$this->db->bind("id", $id);

		if($this->db->executa()):
			return true;
		else:
			return false;
		endif;
	}
}