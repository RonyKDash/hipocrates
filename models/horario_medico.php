<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/hipocrates/db/conexao.php";

class Horario_medico{
    public $id_horario;
    public $data_hora_inicio;
    public $data_hora_fim;
    public $disponivel;
    public $id_medico;

    public function __construct($id_horario = false)
    {
        if ($id_horario) {
            $this->id_horario = $id_horario;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT data_hora_inicio, data_hora_fim, disponivel, id_medico FROM horario_medico 
        WHERE id_horario = :id_horario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_horario', $this->id_horario);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->data_hora_inicio = $lista['data_hora_inicio'];
        $this->data_hora_fim = $lista['data_hora_fim'];
        $this->disponivel = $lista['disponivel'];
        $this->id_medico = $lista['id_medico'];
    }

    public function criar()
    {
        $query = "INSERT INTO  horario_medico (data_hora_inicio, data_hora_fim, id_medico) 
        VALUES (:data_hora_inicio, :data_hora_fim, :id_medico)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':data_hora_inicio', $this->data_hora_inicio);
        $stmt->bindValue(':data_hora_fim', $this->data_hora_fim);
        $stmt->bindValue(':id_medico', $this->id_medico);
        $stmt->execute();
        $id_horario = $conexao->lastInsertId();
        return $id_horario;
        
    }

    public static function listar()
    {
        $query = "select * from horario_medico";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE horario_medico SET data_hora_inicio = :data_hora_inicio, data_hora_fim = :data_hora_fim, 
        disponivel = :disponivel WHERE id_horario = :id_horario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":data_hora_inicio", $this->data_hora_inicio);
        $stmt->bindValue(":data_hora_fim", $this->data_hora_fim);
        $stmt->bindValue(":disponivel", $this->disponivel);
        $stmt->bindValue(":id_horario", $this->id_horario);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM consulta WHERE id_horario = :id_horario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_horario', $this->id_horario);
        $stmt->execute();
    }

    public function removeHorario()
    {
        $query = "UPDATE horario_medico SET disponivel = :disponivel WHERE id_horario = :id_horario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":disponivel", '0');
        $stmt->bindValue(":id_horario", $this->id_horario);
        $stmt->execute();
    }

    public function devolveHorario()
    {
        $query = "UPDATE horario_medico SET disponivel = :disponivel WHERE id_horario = :id_horario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":disponivel", '1');
        $stmt->bindValue(":id_horario", $this->id_horario);
        $stmt->execute();
    }


}