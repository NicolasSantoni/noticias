<?php
/** Página completa para se listar os usuários, verificando se o usuário atual está logado ou não, se não, ele será levado para um formulário para que o mesmo faça login */
	include "config.php";
	include HOME_DIR."view/tema/header.php";
	include HOME_DIR."view/tema/sessao.php";
	include HOME_DIR."view/tema/msg.php";
	include HOME_DIR."view/tema/nav.php";
  if (!isset($_SESSION['user'])) {
    include HOME_DIR."view/paginas/usuarios/entrar.php";
  }
  else {
    include HOME_DIR."view/paginas/usuarios/listar.php";
  }
	include HOME_DIR."view/tema/footer.php";

?>
