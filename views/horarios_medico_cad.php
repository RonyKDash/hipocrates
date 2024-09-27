<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";

$amanha = (new DateTime())->add(new DateInterval('P1D'));
$amanha_formatado = $amanha->format('Y-m-d');
?>

<section id="section-cad-acompanhante">
    <form action="/hipocrates/controllers/add_horario.php" method="post">
        <fieldset>
            <legend>Inicio</legend>
            <div class="form-item">
                <label for="data_inicio">Data</label>
                <input type="date" name="data_inicio" id="data_inicio" min="<?= $amanha_formatado; ?>" required>
            </div>

            <div class="form-item">
                <label for="hora_inicio">Hora</label>
                <input type="time" name="hora_inicio" id="hora_inicio"  required>
            </div>
        </fieldset>

        <fieldset>
            <legend>Fim</legend>
            <div class="form-item">
                <label for="data_fim">Data</label>
                <input type="date" name="data_fim" id="data_fim" min="<?= $amanha_formatado; ?>" required>
            </div>

            <div class="form-item">
                <label for="hora_fim">Hora</label>
                <input type="time" name="hora_fim" id="hora_fim" required>
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