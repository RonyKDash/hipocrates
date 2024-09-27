<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

class Medico{
    public $id_medico;
    public $nome;
    public $cpf;
    public $crm;
    public $foto;
    public $especialidade;
    public $senha;

    public function __construct($id_medico = false)
    {
        if ($id_medico) {
            $this->id_medico = $id_medico;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, cpf, crm, foto, especialidade, senha FROM medico 
        WHERE id_medico = :id_medico";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_medico', $this->id_medico);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->nome = $lista['nome'];
        $this->cpf = $lista['cpf'];
        $this->crm = $lista['crm'];
        $this->foto = $lista['foto'];
        $this->especialidade = $lista['especialidade'];
        $this->senha = $lista['senha'];
    }

    public function criar()
    {
        $query = "INSERT INTO  medico (nome, cpf, crm, foto, especialidade, senha) VALUES (:nome, :cpf, :crm, :foto, :especialidade, :senha)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':cpf', $this->cpf);
        $stmt->bindValue(':crm', $this->crm);
        $stmt->bindValue(':foto', $this->foto);
        $stmt->bindValue(':especialidade', $this->especialidade);
        $stmt->bindValue(':senha', $this->senha);
        $stmt->execute();
        $id_paciente = $conexao->lastInsertId();
        return $id_paciente;
        
    }

    public static function listar()
    {
        $query = "select * from medico";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE medico SET nome = :nome, cpf = :cpf, crm = :crm, especialidade = :especialidade, foto = :foto WHERE id_medico = :id_medico";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome", $this->nome);
        $stmt->bindValue(":cpf", $this->cpf);
        $stmt->bindValue(":crm", $this->crm);
        $stmt->bindValue(":especialidade", $this->especialidade);
        $stmt->bindValue(":foto", $this->foto);
        $stmt->bindValue(":id_medico", $this->id_medico);
        $stmt->execute();
    }

    public function editarSenha()
    {
        $query = "UPDATE medico SET senha = :senha WHERE id_medico = :id_medico";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":senha", $this->senha);
        $stmt->bindValue(":id_medico", $this->id_medico);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM medico WHERE id_medico = :id_medico";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_medico', $this->id_medico);
        $stmt->execute();
    }
}