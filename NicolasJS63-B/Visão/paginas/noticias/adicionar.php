<main>
    <!-- Página com formulário para adicionar uma nova notícia -->
    <form action="<?php echo HOME_URI;?>noticia/criar" method="POST">
      <fieldset>
          <legend>ADICIONAR NOTÍCIA</legend>
          <div class="row">
              <input id="us" type="text" name="titulo" placeholder="Título da notícia"/>
          </div>
          <div class="row">
              <textarea name="descricao" id="is" rows="8" cols="80" placeholder="Conteúdo da notícia"></textarea>
          </div>
          <div class="row">
              <input id="bot" type="submit" name="enviar" value="Enviar" />
          </div>
      </fieldset>
    </form>
</main>
