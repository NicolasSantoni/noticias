<html>
<!-- Página que lista todas as notícias presentes no banco de dados, dando também a opção de adicionar uma notícia se o usuário atual for administrador ou professor -->
<main>
<div class="panel-heading"><h1>Notícias</h1></div>
<?php
if ($_SESSION['user']->admin==2 || $_SESSION['user']->admin==1){
  ?>
  <a href="<?php echo HOME_URI;?>addnoticia.php">
    <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-file-earmark-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2 3a2 2 0 0 1 2-2h5.293a1 1 0 0 1 .707.293L13.707 5a1 1 0 0 1 .293.707V13a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3zm7 2V2l4 4h-3a1 1 0 0 1-1-1zm-.5 2a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V11a.5.5 0 0 0 1 0V9.5H10a.5.5 0 0 0 0-1H8.5V7z"/>
    </svg>
  </a>
  <?php
}
if(isset($noticias)){
    foreach($noticias AS $noticia){
    ?>
    <div class="panel panel-primary">
    <div class="panel-heading"><h2><?php echo $noticia->titulo ?></h2></div>
    <div class="descr">
      <?php echo substr($noticia->descricao,0,180)."..." ?><a href="<?php echo HOME_URI."noticia/ver/".$noticia->id;?>">Ler mais</a>
    </div>
        <div class='data'><span class="label label-primary"><?php echo $noticia->data ?></span><span class="label label-primary"><?php echo "Por: ".$noticia->nome_usuario ?></span></div>

    </div>
    <?php
    }
}
?>


</main>
</html>
