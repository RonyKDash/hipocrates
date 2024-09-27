<?php
session_start();
if (!isset($_SESSION['usuario']['cpf'])) {
    header('Location: /hipocrates/views/PgUser.php');
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/cabecalho.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['data_consulta'];
    $esp = $_POST['especialidade'];

    try {
        $query = "SELECT * FROM medico WHERE especialidade = :esp AND id_medico NOT IN 
                  (SELECT id_medico FROM horario_medico WHERE data_hora_inicio = :data)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":esp", $esp);
        $stmt->bindValue(":data", $data);
        $stmt->execute();
        $medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// Obter a data atual
$hoje = new DateTime();

// Formatar a data como uma string no formato "Y-m-d"
$hoje_formatado = $hoje->format('Y-m-d');

?>

<section style="margin: 1rem;">
    <form action="/hipocrates/views/agendamento.php" method="POST">
        <fieldset>
            <div class="form-item">
                <label for="data_consulta">Data da Consulta:</label>
                <input type="date" name="data_consulta" id="data_consulta" min="<?= $hoje_formatado; ?>">
            </div>

            <div class="form-item">
                <label for="especialidade">Especialidade:</label>
                <select name="especialidade" id="especialidade">
                    <option value="clinico geral">Clinico Geral</option>
                    <option value="odontologia">Odontologia</option>
                    <option value="psicologia">Psicologia</option>
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
                    Buscar
                </button>
            </div>
        </fieldset>
    </form>
</section>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <?php foreach ($medicos as $medico) : ?>
        <section style="margin: 1rem; color: white;">
            <h2><?= $medico['nome'] ?></h2>
            <?php
            $query = "SELECT * FROM horario_medico WHERE disponivel = true AND id_medico = :id_medico AND 
                  DATE_FORMAT(data_hora_inicio, '%Y-%m-%d') = :data ORDER BY data_hora_inicio ASC";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":id_medico", $medico['id_medico']);
            $stmt->bindValue(":data", $data);
            $stmt->execute();
            $horarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php if (count($horarios) > 0) : ?>
                <fieldset>
                    <ul style="list-style-type: none; display: flex; flex-wrap: wrap;">
                        <?php foreach ($horarios as $horario) : ?>
                            <li>
                                <form action="/hipocrates/controllers/add_agendamento.php" method="POST">
                                    <input type="hidden" name="id_medico" value="<?= $medico['id_medico'] ?>">
                                    <input type="hidden" name="data_hora_inicio" value="<?= $horario['data_hora_inicio'] ?>">
                                    <input type="hidden" name="id_horario" value="<?= $horario['id_horario'] ?>">
                                    <button onclick="confirmarDelete(event, this)" type="submit" style="background-color: #00A6FB;"><?= date('H:i', strtotime($horario['data_hora_inicio'])) ?> - <?= date('H:i', strtotime($horario['data_hora_fim'])) ?></button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </fieldset>

            <?php else : ?>
                <fieldset>
                    <p>Nenhum horário disponível para esta data.</p>
                </fieldset>

            <?php endif; ?>
        </section>
    <?php endforeach; ?>
<?php endif; ?>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/templates/rodape.php";
?>