<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

class Acompanhante
{
    public $id_acompanhante;
    public $nome;
    public $cpf;
    public $telefone;
    public $tipo;
    public $id_paciente;

    public function __construct($id_acompanhante = false)
    {
        if ($id_acompanhante) {
            $this->id_acompanhante = $id_acompanhante;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, cpf, telefone, tipo, id_paciente FROM acompanhante WHERE id_acompanhante = :id_acompanhante";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_acompanhante', $this->id_acompanhante);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->nome = $lista['nome'];
        $this->cpf = $lista['cpf'];
        $this->telefone = $lista['telefone'];
        $this->tipo = $lista['tipo'];
        $this->id_paciente = $lista['id_paciente'];
    }

    public function criar()
    {
        $query = "INSERT INTO acompanhante (nome, cpf, telefone, tipo, id_paciente) VALUES (:nome, :cpf, :telefone, :tipo, :id_paciente)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':telefone', $this->telefone);
        $stmt->bindValue(':tipo', $this->tipo);
        $stmt->bindValue(':id_paciente', $this->id_paciente);
        $stmt->execute();
        $this->id_acompanhante = $conexao->lastInsertId();
        return $this->id_acompanhante;
    }

    public static function listar($id_paciente)
    {
        $query = "SELECT * FROM acompanhante WHERE id_paciente = :id_paciente";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE acompanhante SET nome = :nome, cpf = :cpf, telefone = :telefone, tipo = :tipo WHERE id_acompanhante = :id_acompanhante";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":cpf", $this->cpf);
        $stmt->bindValue(":telefone", $this->telefone);
        $stmt->bindValue(":tipo", $this->tipo);
        $stmt->bindValue(":id_acompanhante", $this->id_acompanhante);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM acompanhante WHERE id_acompanhante = :id_acompanhante";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_acompanhante', $this->id_acompanhante);
        $stmt->execute();
    }
}
