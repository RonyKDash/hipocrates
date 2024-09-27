<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/horario_medico.php";
session_start();

try {
    $data_inicio = htmlspecialchars($_POST['data_inicio']);
    $hora_inicio = htmlspecialchars($_POST['hora_inicio']);
    $data_fim = htmlspecialchars($_POST['data_fim']);
    $hora_fim = htmlspecialchars($_POST['hora_fim']);
    $id_medico = $_SESSION['usuario']['id_usuario'];

    $horario = new Horario_medico();
    $horario->data_hora_inicio = $data_inicio . " " . $hora_inicio;
    $horario->data_hora_fim = $data_fim . " " . $hora_fim;
    $horario->id_medico = $id_medico;
    $horario->criar();


    

    header("Location: /hipocrates/views/perfil_medico.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
