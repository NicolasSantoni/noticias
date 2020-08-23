<main>
    <form form action="<?php echo HOME_URI;?>usuario/autenticar" method="POST">
        <fieldset>
            <legend>ENTRE COM O SEU USUÁRIO:</legend>
            <input type="hidden" name="id" />
            <div class="row">
                <input id="us" type="email" name="email" placeholder="INDIQUE SEU EMAIL"/>
            </div>
            <div class="row">
                <input type="password" name="senha" id="us" placeholder="INDIQUE SUA SENHA">
            </div>
            <div class="row">
                <input id="bot" type="submit" name="entrar" value="ENTRAR" />
            </div>
        </fieldset>
    </form>
</main>
