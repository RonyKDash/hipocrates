<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

class Doacao {
    public $id_doacao;
    public $id_paciente;
    public $tipo_doacao;
    public $ultima_doacao;
    public $proxima_doacao;

    public function __construct($id_doacao = false)
    {
        if ($id_doacao) {
            $this->id_doacao = $id_doacao;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT id_paciente, tipo_doacao, ultima_doacao, proxima_doacao FROM doacao WHERE id_doacao = :id_doacao";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_doacao', $this->id_doacao);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->id_paciente = $lista['id_paciente'];
        $this->tipo_doacao = $lista['tipo_doacao'];
        $this->ultima_doacao = $lista['ultima_doacao'];
        $this->proxima_doacao = $lista['proxima_doacao'];
    }

    public function criar()
    {
        $query = "INSERT INTO doacao (id_paciente, tipo_doacao, proxima_doacao) VALUES (:id_paciente, :tipo_doacao, :proxima_doacao)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $this->id_paciente);
        $stmt->bindValue(':tipo_doacao', $this->tipo_doacao);
        $stmt->bindValue(':proxima_doacao', $this->proxima_doacao);
        $stmt->execute();
        $id_doacao = $conexao->lastInsertId();
        return $id_doacao;
    }

    public static function listar($id_paciente)
    {
        $query = "SELECT * FROM doacao WHERE id_paciente = :id_paciente";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE doacao SET tipo_doacao = :tipo_doacao, proxima_doacao = :proxima_doacao WHERE id_doacao = :id_doacao";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":tipo_doacao", $this->tipo_doacao);
        $stmt->bindValue(":proxima_doacao", $this->proxima_doacao);
        $stmt->bindValue(":id_doacao", $this->id_doacao);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM doacao WHERE id_doacao = :id_doacao";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_doacao', $this->id_doacao);
        $stmt->execute();
    }

}