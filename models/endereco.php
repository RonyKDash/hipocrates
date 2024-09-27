<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

class Endereco {
    public $id_endereco;
    public $cep;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $estado;

    public function __construct($id_endereco = false)
    {
        if ($id_endereco) {
            $this->id_endereco = $id_endereco;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT cep, logradouro, numero, complemento, bairro, cidade, estado FROM endereco 
        WHERE id_endereco = :id_endereco";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_endereco', $this->id_endereco);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->cep = $lista['cep'];
        $this->logradouro = $lista['logradouro'];
        $this->numero = $lista['numero'];
        $this->complemento = $lista['complemento'];
        $this->bairro = $lista['bairro'];
        $this->cidade = $lista['cidade'];
        $this->estado = $lista['estado'];
    }

    public function criar()
    {
        $query = "INSERT INTO  endereco (cep, logradouro, numero, complemento, bairro, cidade, estado) VALUES (:cep, :logradouro, :numero, :complemento, :bairro, :cidade, :estado)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':cep', $this->cep);
        $stmt->bindValue(':logradouro', $this->logradouro);
        $stmt->bindValue(':numero', $this->numero);
        $stmt->bindValue(':complemento', $this->complemento);
        $stmt->bindValue(':bairro', $this->bairro);
        $stmt->bindValue(':cidade', $this->cidade);
        $stmt->bindValue(':estado', $this->estado);
        $stmt->execute();
        $id_endereco = $conexao->lastInsertId();
        return $id_endereco;
        
    }

    public static function listar()
    {
        $query = "select * from endereco";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE endereco SET cep = :cep, logradouro = :logradouro, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado WHERE id_endereco = :id_endereco";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":cep", $this->cep);
        $stmt->bindValue(":logradouro", $this->logradouro);
        $stmt->bindValue(":numero", $this->numero);
        $stmt->bindValue(":complemento", $this->complemento);
        $stmt->bindValue(":bairro", $this->bairro);
        $stmt->bindValue(":cidade", $this->cidade);
        $stmt->bindValue(":estado", $this->estado);
        $stmt->bindValue(":id_endereco", $this->id_endereco);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM endereco WHERE id_endereco = :id_endereco";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_endereco', $this->id_endereco);
        $stmt->execute();
    }

}