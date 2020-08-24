<main>
    <!-- Página para se criar um novo usuário -->
    <form action="<?php echo HOME_URI;?>usuario/salvar" method="POST">
      <fieldset>
          <legend>Cadastro de usuários</legend>
          <input type="hidden" name="id" />
          <div class="row">
              <input id="us" type="text" name="nome" placeholder="Nome do usuário"/>
          </div>
          <div class="row">
              <input id="us" type="text" name="email" placeholder="Email"/>
          </div>
          <div class="row">
              <select id="tipo" name="tipo">
                  <option value="0">Sou aluno</option>
                  <option value="1">Sou professor</option>
                  <option value="2">Sou administrador</option>
              </select>
          </div>
          <div class="row">
              <input id="bot" type="submit" name="enviar" value="Enviar" />
          </div>
      </fieldset>
    </form>
</main>
