<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/paciente.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/medico.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/consulta.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/horario_medico.php";
session_start();

try {
    $id_medico = htmlspecialchars($_POST['id_medico']);
    $id_paciente = htmlspecialchars($_SESSION['usuario']['id_usuario']);
    $data_consulta = htmlspecialchars($_POST['data_hora_inicio']);
    $id_horario = $_POST['id_horario'];

    $consulta = new Consulta();
    $consulta->id_medico = $id_medico;
    $consulta->id_paciente = $id_paciente;
    $consulta->data_consulta = $data_consulta;
    $consulta->id_horario = $id_horario;
    $consulta->criar();

    $horario = new Horario_medico($id_horario);
    $horario->removeHorario();


    header("Location: /hipocrates/views/perfil.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
