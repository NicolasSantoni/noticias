<?php
/** Página completa de início, que verifica se é a primeira vez que o usuário atual entrou pela primeira vez ou não, se sim, aparecerá um formulário para o mesmo mudar a senha */
	include "config.php";
	error_reporting(0);
  ini_set("display_errors", 0 );
	include HOME_DIR."view/tema/header.php";
	include HOME_DIR."view/tema/sessao.php";
	include HOME_DIR."view/tema/msg.php";
	include HOME_DIR."view/tema/nav.php";
	if ($_SESSION['user']->primvez == 1 && $_SESSION['user']->id != 1) {
		include HOME_DIR."view/paginas/usuarios/trocarsenha.php";
		$_SESSION['user']->primvez = 2;
		$cont++;
	}
	else {

		include HOME_DIR."start.php";
		$cont = 0;



	}
	include HOME_DIR."view/tema/footer.php";
?>
