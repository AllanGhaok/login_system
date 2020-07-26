<!-- Responsavel pelo o que o usuário verá, que no caso são as postagens -->
<div class="container py-5">
	<?=Sessao::mensagem('post')?>
	<div class="card">
		<div class="card-header bg-info text-white">
			POSTAGENS
			<div class="float-right">
				<a href="<?=URL?>/posts/cadastrar" class="btn btn-light">Escrever</a>
			</div>
		</div>
		<div class="card-body">
			<?php foreach($dados['posts'] as $post) : ?>
				<div class="card mb-5">
					<div class="card-header">
						<p><?= $post->titulo ?></p>
					</div>
					<div class="card-body">
						<p class="card-text"><?= $post->texto ?></p>
						<a href="<?= URL.'/posts/ver/'.$post->postId ?>" class="btn btn-primary float-right">Ler mais</a>	
					</div>
					<div class="card-footer text-muted">
						Escrito por: <?= $post->nome ?> em <?= date('d/m/Y H:i', strtotime($post->postDataCadastro)) ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>