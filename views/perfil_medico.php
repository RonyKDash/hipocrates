<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/medico.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/consulta.php";

$medico = new Medico($_SESSION['usuario']['id_usuario']);
$consultas = Consulta::listar($_SESSION['usuario']['id_usuario']);
?>

<section class="perfil">
    <h1><?= $medico->nome ?></h1>

    <div class="img-pessoais">
        <div class="metade">
            <figure">
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($medico->foto); ?>" alt="" width="100%">
                </figure>
        </div>

        <div class="metade">
            <fieldset>
                <div class="form-item">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" value="<?= $medico->cpf ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="crm">CRM:</label>
                    <input type="text" id="crm" value="<?= $medico->crm ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="especialidade">Especialidade:</label>
                    <input type="text" id="especialidade" value="<?= $medico->especialidade ?>" disabled>
                </div>
            </fieldset>

        </div>
    </div>
</section>

<a href="/hipocrates/views/horarios_medico_cad.php">
    <button class="btn-sucesso">
        Adicionar Horario
    </button>
</a>

<?php if (count($consultas) > 0) : ?>
    <h1>Consultas Agendadas</h1>
    <?php foreach ($consultas as $consulta) : ?>
        <section class="perfil">
            <fieldset>
                <div class="img-pessoais">
                    <div class="form-item">
                        <label for="nome_paciente">Nome do Paciente:</label>
                        <input type="text" name="nome_paciente" id="nome_paciente" value="<?= Consulta::buscarNomePaciente($consulta['id_paciente']) ?>" disabled>
                    </div>

                    <div class="form-item">
                        <label for="data_consulta">Data:</label>
                        <input type="text" name="data_consulta" id="data_consulta" value="<?= date("d/m/Y h:i", strtotime($consulta['data_consulta'])) ?>" disabled>
                    </div>
                </div>

                <a onclick="confirmarDelete(event, this)" href="/hipocrates/controllers/del_agendamento.php?id_consulta=<?= $consulta['id_consulta'] ?>">
                    <button class="btn-perigo">
                        Cancelar Consulta
                    </button>
                </a>

                <!--  <a href="/hipocrates/views/editar_acompanhante.php?id_acompanhante=<?= $acompanhante['id_acompanhante'] ?>">
                    <button>
                        Editar
                    </button>
                </a> -->

            </fieldset>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>