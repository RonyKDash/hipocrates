<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php"

?>

<section id="section-cad-acompanhante">
    <form action="/hipocrates/controllers/add_acompanhante.php" method="post" enctype="multipart/form-data" id="cad-user">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <div class="form-item">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div class="form-item">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" required>
            </div>

            <div class="form-item">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" required>
            </div>

            <div class="form-item">
                <label for="tipo">Tipo de Acompanhante</label>
                <select name="tipo" id="tipo">
                    <option value="pais" selected>Pais</option>
                    <option value="conjuges">Cônjuges</option>
                    <option value="irmaos">Irmãos</option>
                    <option value="filhos">Filhos</option>
                    <option value="outros">Outros</option>
                </select>
            </div>
        </fieldset>
        <button type="submit" class="btn-sucesso">
            Cadastrar
        </button>
    </form>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php"
?>