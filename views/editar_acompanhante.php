<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/acompanhante.php";

try {
    $acompanhante = new Acompanhante($_GET['id_acompanhante']);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section id="section-cad-acompanhante">
    <form action="/hipocrates/controllers/edit_acompanhante.php" method="post" enctype="multipart/form-data" id="cad-user">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <input type="hidden" name="id_acompanhante" value="<?= $acompanhante->id_acompanhante ?>">
            <div class="form-item">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $acompanhante->nome ?>" required>
            </div>

            <div class="form-item">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" value="<?= $acompanhante->cpf ?>" required>
            </div>

            <div class="form-item">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="<?= $acompanhante->telefone ?>" required>
            </div>

            <div class="form-item">
                <label for="tipo">Tipo de Acompanhante</label>
                <select name="tipo" id="tipo">
                    <option value="pais" <?= ($acompanhante->tipo == 'pais') ? 'selected' : '' ?>>Pais</option>
                    <option value="conjuges" <?= ($acompanhante->tipo == 'conjuges') ? 'selected' : '' ?>>Cônjuges</option>
                    <option value="irmaos" <?= ($acompanhante->tipo == 'irmaos') ? 'selected' : '' ?>>Irmãos</option>
                    <option value="filhos" <?= ($acompanhante->tipo == 'filhos') ? 'selected' : '' ?>>Filhos</option>
                    <option value="outros" <?= ($acompanhante->tipo == 'outros') ? 'selected' : '' ?>>Outros</option>
                </select>
            </div>
        </fieldset>
        <button type="submit" class="btn-sucesso">
            Atualizar
        </button>
    </form>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php"
?>