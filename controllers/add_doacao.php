<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/doacao.php";
session_start();

try {
    $data_doacao = htmlspecialchars($_POST['data_doacao']);
    $tipo_doacao = htmlspecialchars($_POST['tipo_doacao']);
    $id_usuario = $_SESSION['usuario']['id_usuario'];

    $doacao = new Doacao();
    $doacao->tipo_doacao = $tipo_doacao;
    $doacao->id_paciente = $id_usuario;
    $doacao->proxima_doacao = $data_doacao;
    $doacao->criar();


    

    header("Location: /hipocrates/views/perfil.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
