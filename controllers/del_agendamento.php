<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/paciente.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/medico.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/consulta.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/horario_medico.php";

try {
    $id_consulta = $_GET['id_consulta']; //captura o id da consulta
    $consulta = new Consulta($id_consulta); //carrega a consulta com esse id
    $id_horario = $consulta->id_horario; //pega o id do horario na consulta
    $horario = new Horario_medico($id_horario); // carrega o horario
    $horario->devolveHorario(); //devolve o horario
    $consulta->deletar(); // deleta a consulta

    
    header("Location: /hipocrates/index.php");
} catch (Exception $e) {
    echo $e->getMessage();
}