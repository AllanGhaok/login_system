<?php
/*error_reporting - Define quais erros serão reportados. ini_set faz a exata mesma coisa.
error_reporting();
ini_set('error_reporting', 0);

//Criar esta função e utiliza-la junto com o set_error_handler faz com que você possa editar o erro e até mesmo colocar css na linha.
function phpErro($erro, $mensagem, $arquivo, $linha){

//Cada case é um número diferente do erro
	switch ($erro):
        case 2;
            $css = 'alert-warning';
            break;
        case 8;
            $css = 'alert-primary';
            break;
        case 16;
            $css = 'alert-danger';
            break;
        default:
            $css = '';
    endswitch;

	echo "<p><b>Erro:</b> {$mensagem} <b>no arquivo</b> {$arquivo} <b>na linha</b> {$linha}</p>";
}

set_error_handler('phpErro');

//Fazendo log de erros

$logs = Erro: {$mensagem} no arquivo {$arquivo} na linha {$linha}";
error_log($logs,3,'phperro.log');