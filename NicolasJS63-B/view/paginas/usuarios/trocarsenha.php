<main>
    <!-- Página com um formulário para o usuário atual alterar sua senha -->
    <form action="<?php echo HOME_URI;?>usuario/trocar_senha" method="POST">
      <fieldset>
        <legend>MUDE SUA SENHA!</legend>
        <div class="row">
            <input type="password" name="senha" id="us" placeholder="INDIQUE SUA NOVA SENHA">
        </div>
        <div class="row">
            <input id="bot" type="submit" name="entrar" value="ENTRAR" />
        </div>
      </fieldset>
    </form>
</main>
