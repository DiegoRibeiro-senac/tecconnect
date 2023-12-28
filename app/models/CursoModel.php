<?php
require_once '../database/Conexao.Class.php';


class CursoModel extends Conexao
{
    function getNumVagas($id_curso = null)
    {
        try {
            $this->db_connect();
            $sql = "SELECT vagas_disponiveis FROM cursos WHERE id_curso = :id_curso";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_curso', $id_curso);
            $stmt->execute();
            $temp = $stmt->fetchAll(PDO::FETCH_OBJ);
            $numVagas = $temp[0]->vagas_disponiveis;
            $this->db_close();
            return $numVagas;
        } catch (Exception $e) {
            die('DB ERROR -> getNumVagas(): ' . $e->getMessage());
        }
    }


    function getAllNumVagas()
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM cursos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $cursos = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $cursos;
        } catch (Exception $e) {
            die('DB ERROR -> ' . $e->getMessage());
        }
    }


    function fetchAll()
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM cursos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $res;
        } catch (Exception $e) {
            die('DB ERROR -> getNumVagas(): ' . $e->getMessage());
        }
    }


    public function fetch($id)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare("SELECT * FROM cursos WHERE id_curso = :id_curso");
            $stmt->bindParam(":id_curso", $id);

            if ($stmt->execute()) return $stmt->fetch(PDO::FETCH_OBJ);
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function create($dados)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare(
                "INSERT INTO cursos
                (nome_curso, data, prazo_de_inscricao, hora_inicio, hora_fim, num_vagas, vagas_disponiveis)
                VALUES (:nome_curso, :data, :prazo_de_inscricao, :hora_inicio, :hora_fim, :num_vagas, :vagas_disponiveis)"
            );
            if ($stmt->execute($dados)) return true;
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }



    public function delete($id_curso)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare("DELETE FROM cursos WHERE id_curso = :id_curso");
            $stmt->bindParam(':id_curso', $id_curso);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }


    public function update($dados)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare(
                "UPDATE cursos 
                SET nome_curso = :nome_curso, data = :data, prazo_de_inscricao = :prazo_de_inscricao,
                hora_inicio = :hora_inicio, hora_fim = :hora_fim, num_vagas = :num_vagas,
                vagas_disponiveis = :vagas_disponiveis
                WHERE id_curso = :id_curso"
            );

            $stmt->execute($dados);

            if ($stmt->rowCount() > 0) return true;
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
}
