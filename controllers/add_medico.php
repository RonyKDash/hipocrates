<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/medico.php";




try {
    $nome = htmlspecialchars($_POST['nome']);
    $crm = htmlspecialchars($_POST['crm']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $especialidade = htmlspecialchars($_POST['especialidade']);
    if (!empty($_FILES['foto']['tmp_name'])) {
        $imagem = file_get_contents($_FILES['foto']['tmp_name']);
    }
    $senha = $_POST['senha'];
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $medico = new Medico();
    $medico->nome = $nome;
    $medico->cpf = $cpf;
    $medico->crm = $crm;
    $medico->especialidade = $especialidade;
    $medico->foto = $imagem;
    $medico->senha = $senha;
    $medico->criar();

    header("Location: /hipocrates/index.php");
} catch (PDOException $e) {
    echo $e->getMessage();
}
