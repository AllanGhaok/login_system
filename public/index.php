<?php
	session_start();

	include "./../app/configuracao.php";
	include "./../app/autoload.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title><?=APP_NOME?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=URL?>/public/css/estilos.css">
</head>
<body>
	<?php
		include '../app/Views/topo.php';
		$rotas = new Rota();
		include '../app/Views/rodape.php';
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="<?=URL?>/public/js/jquery.funcoes.js"></script>
</body>
</html>