<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/hipocrates/models/doacao.php';

try {
    $id_doacao = $_POST['id_doacao'];
    $tipo = htmlspecialchars($_POST['tipo_doacao']);
    $proxima_doacao = htmlspecialchars($_POST['data_doacao']);

    $doacao = new Doacao($id_doacao);
    $doacao->tipo_doacao = $tipo;
    $doacao->proxima_doacao = $proxima_doacao;
    $doacao->editar();

    header("Location: /hipocrates/views/perfil.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}