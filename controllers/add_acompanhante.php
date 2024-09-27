<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/paciente.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/acompanhante.php";
session_start();

try {
    $nome = htmlspecialchars($_POST['nome']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $tipo = htmlspecialchars($_POST['tipo']);

    $id_paciente = $_SESSION['usuario']['id_usuario'];

    $paciente = new Paciente($id_paciente);
    $acompanhante = new Acompanhante();
    $acompanhante->nome = $nome;
    $acompanhante->cpf = $cpf;
    $acompanhante->telefone = $telefone;
    $acompanhante->tipo = $tipo;
    $acompanhante->id_paciente = $paciente->id_paciente;
    $acompanhante->criar();


    

    header("Location: /hipocrates/views/perfil.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
