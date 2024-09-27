<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/paciente.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/models/endereco.php";

try {
    $cep = htmlspecialchars($_POST['cep']);
    $logradouro = htmlspecialchars($_POST['logradouro']);
    $numero = htmlspecialchars($_POST['numero']);
    $complemento = htmlspecialchars($_POST['complemento']);
    $bairro = htmlspecialchars($_POST['bairro']);
    $cidade = htmlspecialchars($_POST['cidade']);
    $estado = htmlspecialchars($_POST['estado']);

    $endereco = new Endereco();
    $endereco->cep = $cep;
    $endereco->logradouro = $logradouro;
    $endereco->numero = $numero;
    $endereco->complemento = $complemento;
    $endereco->bairro = $bairro;
    $endereco->cidade = $cidade;
    $endereco->estado = $estado;
    $id_endereco = $endereco->criar();


    try {
        $nome = htmlspecialchars($_POST['nome']);
        $rg = htmlspecialchars($_POST['rg']);
        $orgao = htmlspecialchars($_POST['orgao']);
        $cpf = htmlspecialchars($_POST['cpf']);
        $cns = htmlspecialchars($_POST['cns']);
        $genero = htmlspecialchars($_POST['genero']);
        $nascimento = htmlspecialchars($_POST['nascimento']);
        $est_civ = htmlspecialchars($_POST['estado_civ']);
        $etnia = htmlspecialchars($_POST['etnia']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $email = htmlspecialchars($_POST['email']);
        $tipo_san = htmlspecialchars($_POST['tipo_sangue']);
        if (!empty($_FILES['foto']['tmp_name'])) {
            $imagem = file_get_contents($_FILES['foto']['tmp_name']);
        }
        $senha = $_POST['senha'];
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        if (!is_null($_POST['limitacoes'])) {
            $limitacoes = $_POST['limitacoes'];
            $limitacoes = implode(',', $limitacoes);
        } else {
            $limitacoes = null;
        }

        $paciente = new Paciente();
        $paciente->nome = $nome;
        $paciente->rg = $rg;
        $paciente->orgao_emissor = $orgao;
        $paciente->cpf = $cpf;
        $paciente->cns = $cns;
        $paciente->genero = $genero;
        $paciente->nascimento = $nascimento;
        $paciente->estado_civil = $est_civ;
        $paciente->etnias = $etnia;
        $paciente->telefone = $telefone;
        $paciente->email = $email;
        $paciente->tipo_sanguineo = $tipo_san;
        $paciente->foto = $imagem;
        $paciente->senha = $senha;
        $paciente->id_endereco = $id_endereco;
        $paciente->limitacoes = $limitacoes;
        $paciente->criar();

        header("Location: /hipocrates/index.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
