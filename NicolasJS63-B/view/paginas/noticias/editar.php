<main>
    <!-- Página com formulário para editar uma determinada notícia -->
    <form method="POST">
      <fieldset>
          <legend>EDITAR NOTÍCIA</legend>
          <div class="row">
              <input id="us" type="text" name="titulo" placeholder="Editar título da notícia"/>
          </div>
          <div class="row">
              <textarea name="descricao" id="is" rows="8" cols="80" placeholder="Editar conteúdo da notícia"></textarea>
          </div>
          <div class="row">
              <input id="bot" type="submit" name="enviar" value="Editar" />
          </div>
      </fieldset>
    </form>
</main>
