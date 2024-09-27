<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/hipocrates/models/acompanhante.php';

try {
    $id_acompanhante = $_POST['id_acompanhante'];
    $nome = htmlspecialchars($_POST['nome']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $tipo = htmlspecialchars($_POST['tipo']);

    $acompanhante = new Acompanhante($id_acompanhante);
    $acompanhante->nome = $nome;
    $acompanhante->cpf = $cpf;
    $acompanhante->telefone = $telefone;
    $acompanhante->tipo = $tipo;
    $acompanhante->editar();

    header("Location: /hipocrates/views/perfil.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}