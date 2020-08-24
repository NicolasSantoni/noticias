<main>
    <!-- Página com um formulário para editar um certo usuário -->
    <form method="POST">
        <fieldset>
            <legend>EDITE O USUÁRIO:</legend>
            <input type="hidden" name="id" value=""/>
            <div class="row">
                <input id="us" type="text" name="nome" placeholder="INDIQUE O NOVO NOME"/>
            </div>
            <div class="row">
                <input id="us" type="email" name="email" placeholder="INDIQUE O NOVO EMAIL"/>
            </div>
            <div class="row">
                <select id="tipo" name="tipo">
                    <option value="0">Agora é aluno</option>
                    <option value="1">Agora é professor</option>
                    <option value="2">Agora é administrador</option>
                </select>
            </div>
            <div class="row">
                <input id="bot" type="submit" name="editar" value="EDITAR" />
            </div>
        </fieldset>
    </form>
</main>
