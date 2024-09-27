<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/hipocrates/models/doacao.php';

try {
    $id_doacao = $_GET['id_doacao'];

    $doacao = new Doacao($id_doacao);

    $doacao->deletar();

    header("Location: /hipocrates/views/perfil.php");
} catch (Exception $e) {
    echo $e->getMessage();
}