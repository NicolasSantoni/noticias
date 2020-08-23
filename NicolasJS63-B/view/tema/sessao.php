<?php
  if(isset($_SESSION['user'])){
      include HOME_DIR."view/tema/sair.php";
			}
	else{
		include HOME_DIR."view/tema/user.php";
	}
?>
