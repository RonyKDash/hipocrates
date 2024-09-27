<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/paciente.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/endereco.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/acompanhante.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/consulta.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/doacao.php";

$paciente = new Paciente($_SESSION['usuario']['id_usuario']);
$endereco = new Endereco($paciente->id_endereco);

$lista_acompanhantes = Acompanhante::listar($_SESSION['usuario']['id_usuario']);
$lista_consulta = Consulta::listar($_SESSION['usuario']['id_usuario']);
$lista_doacoes = Doacao::listar($_SESSION['usuario']['id_usuario']);


?>

<section class="perfil">
    <h1><?= $paciente->nome ?></h1>

    <div class="img-pessoais">
        <div class="metade">
            <figure style="height: 100%;">
                <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($paciente->foto); ?>" alt="" width="100%">
            </figure>
        </div>

        <div class="metade">
            <fieldset>
                <div class="form-item">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" value="<?= $paciente->cpf ?>" class="cpf-mask" disabled>
                </div>

                <div class="form-item">
                    <label for="rg">RG:</label>
                    <input type="text" id="rg" value="<?= $paciente->rg ?> <?= $paciente->orgao_emissor ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="cns">CNS:</label>
                    <input type="text" id="cns" value="<?= $paciente->cns ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="genero">Gênero:</label>
                    <input type="text" id="genero" value="<?= $paciente->genero ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="nascimento">Data de Nasc.:</label>
                    <input type="text" id="nascimento" value="<?= date("d/m/Y", strtotime($paciente->nascimento))    ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="etnia">Etnia:</label>
                    <input type="text" id="etnia" value="<?= $paciente->etnias ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="sangue">Tipo Sanguineo:</label>
                    <input type="text" id="sangue" value="<?= $paciente->tipo_sanguineo ?>" disabled>
                </div>

                <div class="form-item">
                    <label for="estado_civil">Estado Civil:</label>
                    <input type="text" id="estado_civil" value="<?= $paciente->estado_civil ?>" disabled>
                </div>
            </fieldset>

        </div>
    </div>

    <div class="img-pessoais">
        <fieldset>
            <div class="form-item">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" value="<?= $paciente->telefone ?>" class="telefone-mask" disabled>
            </div>

            <div class="form-item">
                <label for="email">Email:</label>
                <input type="text" id="email" value="<?= $paciente->email ?>" disabled>
            </div>
        </fieldset>

    </div>

    <div class="img-pessoais">
        <fieldset>
            <div class="form-item">
                <label for="limitacao">Limitações:</label>
                <input type="text" id="limitacao" value="<?= $paciente->limitacoes ?>" disabled>
            </div>
        </fieldset>
    </div>


    <fieldset>
        <div class="img-pessoais">
            <div class="form-item">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" value="<?= $endereco->cep ?>" class="cep-mask" disabled>
            </div>
            <div class="form-item">
                <label for="logradouro">Logradouro:</label>
                <input type="text" id="logradouro" value="<?= $endereco->logradouro ?>" disabled>
            </div>
        </div>

        <div class="img-pessoais">
            <div class="form-item">
                <label for="numero">Numero:</label>
                <input type="text" id="numero" value="<?= $endereco->numero ?>" disabled>
            </div>
            <div class="form-item">
                <label for="complemento">Complemento:</label>
                <input type="text" id="complemento" value="<?= $endereco->complemento ?>" disabled>
            </div>
        </div>

        <div class="img-pessoais">
            <div class="form-item">
                <label for="bairro">Bairro:</label>
                <input type="text" id="bairro" value="<?= $endereco->bairro ?>" disabled>
            </div>
            <div class="form-item">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" value="<?= $endereco->cidade ?>" disabled>
            </div>
            <div class="form-item">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" value="<?= $endereco->estado ?>" disabled>
            </div>
        </div>
    </fieldset>

    <a href="/hipocrates/views/acompanhante_cad.php">
        <button type="submit" class="btn-sucesso">
            Adicionar Acompanhante
        </button>
    </a>
</section>

<?php if (count($lista_acompanhantes) > 0) : ?>
    <h1>Acompanhantes</h1>
    <?php foreach ($lista_acompanhantes as $acompanhante) : ?>
        <section class="perfil">
            <fieldset>
                <div class="img-pessoais">
                    <div class="form-item">
                        <label for="nome_acompanhante">Nome:</label>
                        <input type="text" name="nome_acompanhante" id="nome_acompanhante" value="<?= $acompanhante['nome'] ?>" disabled>
                    </div>

                    <div class="form-item">
                        <label for="cpf_acompanhante">CPF:</label>
                        <input type="text" name="cpf_acompanhante" id="cpf_acompanhante" value="<?= $acompanhante['cpf'] ?>" class="cpf-mask" disabled>
                    </div>

                    <div class="form-item">
                        <label for="telefone_acompanhante">Telefone:</label>
                        <input type="text" name="telefone_acompanhante" id="telefone_acompanhante" value="<?= $acompanhante['telefone'] ?>" class="telefone-mask" disabled>
                    </div>

                    <div class="form-item">
                        <label for="tipo_acompanhante">Relação:</label>
                        <input type="text" name="tipo_acompanhante" id="tipo_acompanhante" value="<?= $acompanhante['tipo'] ?>" disabled>
                    </div>
                </div>

                <a onclick="confirmarDelete(event, this)" href="/hipocrates/controllers/del_acompanhante.php?id_acompanhante=<?= $acompanhante['id_acompanhante'] ?>">
                    <button class="btn-perigo">
                        Deletar
                    </button>
                </a>

                <a href="/hipocrates/views/editar_acompanhante.php?id_acompanhante=<?= $acompanhante['id_acompanhante'] ?>">
                    <button class="btn-alerta">
                        Editar
                    </button>
                </a>

            </fieldset>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (count($lista_consulta) > 0) : ?>
    <h1>Consultas</h1>
    <?php foreach ($lista_consulta as $consulta) : ?>
        <section class="perfil">
            <fieldset>
                <div class="img-pessoais">
                    <div class="form-item">
                        <label for="nome_medico">Medico:</label>
                        <input type="text" name="nome_medico" id="nome_medico" value="<?= Consulta::buscarNomeMedico($consulta['id_medico']) ?>" disabled>
                    </div>

                    <div class="form-item">
                        <label for="especialidade">Tipo:</label>
                        <input type="text" name="especialidade" id="especialidade" value="<?= Consulta::buscarTipoMedico($consulta['id_medico']) ?>" disabled>
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
            </fieldset>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (count($lista_doacoes) > 0) : ?>
    <h1>Doações</h1>
    <?php foreach ($lista_doacoes as $doacao) : ?>
        <section class="perfil">
            <fieldset>
                <div class="img-pessoais">
                    <div class="form-item">
                        <label for="tipo_doacao">Tipo:</label>
                        <input type="text" name="tipo_doacao" id="tipo_doacao" value="<?= $doacao['tipo_doacao'] ?>" disabled>
                    </div>

                    <div class="form-item">
                        <label for="data_doacao">Proxima Doação:</label>
                        <input type="text" name="data_doacao" id="data_doacao" value="<?= date("d/m/Y", strtotime($doacao['proxima_doacao'])) ?>" disabled>
                    </div>
                </div>

                <a onclick="confirmarDelete(event, this)" href="/hipocrates/controllers/del_doacao.php?id_doacao=<?= $doacao['id_doacao'] ?>">
                    <button class="btn-perigo">
                        Cancelar
                    </button>
                </a>

                <a href="/hipocrates/views/editar_doacao.php?id_doacao=<?= $doacao['id_doacao'] ?>">
                    <button class="btn-alerta">
                        Editar
                    </button>
                </a>

            </fieldset>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<script>
    window.addEventListener('load', function() {
        var cpfInputs = document.querySelectorAll('.cpf-mask');
        var telefoneInputs = document.querySelectorAll('.telefone-mask');
        var cepInputs = document.querySelectorAll('.cep-mask');

        cpfInputs.forEach(function(cpfInput) {
            var cpfValue = cpfInput.value;
            var cpfMasked = cpfValue.replace(/^(\d{3})(\d{3})(\d{3})(\d{2})$/, "$1.$2.$3-$4");
            cpfInput.value = cpfMasked;
        });

        telefoneInputs.forEach(function(telefoneInput) {
            var telefoneValue = telefoneInput.value;
            var telefoneMasked = telefoneValue.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
            telefoneInput.value = telefoneMasked;
        });

        cepInputs.forEach(function(cepInput) {
            var cepValue = cepInput.value;
            var cepMasked = cepValue.replace(/^(\d{2})(\d{3})(\d{3})$/, "$1.$2-$3");
            cepInput.value = cepMasked;
        });
    });
</script>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>