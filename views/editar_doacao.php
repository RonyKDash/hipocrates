<?php
session_start();
if (!isset($_SESSION['usuario']['cpf'])) {
    header('Location: /hipocrates/views/PgUser.php');
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/doacao.php";

// Obter a data atual
$hoje = new DateTime();

// Formatar a data como uma string no formato "Y-m-d"
$hoje_formatado = $hoje->format('Y-m-d');

try {
    $doacao = new Doacao($_GET['id_doacao']);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<section style="margin: 1rem;">
    <form action="/hipocrates/controllers/edit_doacao.php" method="POST">
        <fieldset>
            <input type="hidden" name="id_doacao" value="<?= $doacao->id_doacao ?>">
            <div class="form-item">
                <label for="data_doacao">Data da Doação:</label>
                <input type="date" name="data_doacao" id="data_doacao" min="<?= $hoje_formatado; ?>" value="<?= $doacao->proxima_doacao ?>">
            </div>

            <div class="form-item">
                <label for="tipo_doacao">Doação de:</label>
                <select name="tipo_doacao" id="tipo_doacao">
                    <option value="sangue" <?= ($doacao->tipo_doacao == 'pais') ? 'selected' : '' ?>>Sangue</option>
                    <option value="medula" <?= ($doacao->tipo_doacao == 'pais') ? 'selected' : '' ?>>Medula</option>
                </select>
            </div>

            <div class="form-item">
                <button type="submit">
                    Atualizar
                </button>
            </div>
        </fieldset>
    </form>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>