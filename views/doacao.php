<?php
session_start();
if (!isset($_SESSION['usuario']['cpf'])) {
    header('Location: /hipocrates/views/PgUser.php');
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

// Obter a data atual
$hoje = new DateTime();

// Formatar a data como uma string no formato "Y-m-d"
$hoje_formatado = $hoje->format('Y-m-d');

?>

<section style="margin: 1rem;">
    <form action="/hipocrates/controllers/add_doacao.php" method="POST">
        <fieldset>
            <div class="form-item">
                <label for="data_doacao">Data da Doação:</label>
                <input type="date" name="data_doacao" id="data_doacao" min="<?= $hoje_formatado; ?>">
            </div>

            <div class="form-item">
                <label for="tipo_doacao">Doação de:</label>
                <select name="tipo_doacao" id="tipo_doacao">
                    <option value="sangue">Sangue</option>
                    <option value="medula">Medula</option>
                </select>
            </div>

            <!-- <div class="form-item">
                <label for="medico">Medico:</label>
                <select name="medico" id="medico">
                    <option value="fulano">Fulano</option>
                    <option value="ciclano">Ciclano</option>
                </select>
            </div> -->

            <div class="form-item">
                <button type="submit">
                    Cadastrar
                </button>
            </div>
        </fieldset>
    </form>
</section>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>