<html>
<main>
<div class="panel-heading"><h1>Notícias</h1></div>
<div class="panel panel-primary">

<div class="panel-heading"><h1><?php echo $noticia->titulo ?></h1>
  <?php
  if ($_SESSION['user']->admin==2 || $_SESSION['user']->nome==$noticia->nome_usuario) {
    ?>
    <a href="<?php echo HOME_URI.'/noticia/editar/'.$noticia->id?>">
      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi_bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path color="#FFFFFF" d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path color="#FFFFFF" fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg>
    </a>
    <a href="<?php echo HOME_URI.'/noticia/deletar/'.$noticia->id?>">
      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi_bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path color="#FFFFFF" fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
      </svg>
    </a>
    <?php
  }
  ?>
</div>
    <div class="desc">
      <?php echo $noticia->descricao ?>
    </div>

    <div class='data'>
        <span class="label label-primary"><?php echo $noticia->data ?></span>
        <span class="label label-primary"><?php echo "Por: ".$noticia->nome_usuario ?></span>
    </div>

    </div>

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h5 class="panel-title">Comentários</h5>
        </div>

        <?php
        $conexao = Conexao::getInstance();
        $sql = 'SELECT id, comentario, (SELECT nome FROM usuario WHERE id = c.usuario_id) AS nome_usuario FROM comentario c WHERE noticia_id = '.$noticia->id;
        $resultado = $conexao->query($sql);
        while ($item = $resultado->fetch(PDO::FETCH_OBJ)) {
            $comentarios[] = $item;
        }
        $noticia->comentarios = $comentarios;
            if ($noticia->comentarios){
                foreach ($noticia->comentarios AS $comentario){
        ?>
        <div class="coments">
            <p class="nome-user"><?php echo $comentario->nome_usuario?> diz:</p>
            <?php
              if ($_SESSION['user']->admin==2 || $_SESSION['user']->nome==$noticia->nome_usuario || $_SESSION['user']->nome==$comentario->nome_usuario) {
                ?>
                <a href="<?php echo HOME_URI.'/comentario/deletar/'.$comentario->id?>">
                  <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bibi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path color="#2b6ca3" fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                  </svg>
                </a>
                <?php
              }
            ?>
            <p class="coment-user"><?php echo $comentario->comentario?></p>
        </div>
        <?php
                }
            }
            if (isset($_SESSION['user'])) {
        ?>
         <form class="form" action="<?php echo HOME_URI.'/noticia/comentar'?>" method="POST">
             <input type="hidden" name="noticia_id" value="<?php echo $noticia->id ?>">
             <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['user']->id ?>">
             <div class="form-group">
            <input type="text" class="form-control" name="comentario" placeholder="Adicione um comentário">
            <div class="input-form">
            <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
            </div>

        </form>
        <?php
      }
        ?>

    </div>



</div>


</main>
</html>
