<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/hipocrates/models/acompanhante.php';

try {
    $id_acompanhante = $_GET['id_acompanhante'];

    $acompanhante = new Acompanhante($id_acompanhante);

    $acompanhante->deletar();

    header("Location: /hipocrates/views/perfil.php");
} catch (Exception $e) {
    echo $e->getMessage();
}