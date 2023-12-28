<?php
require_once '../database/Conexao.Class.php';


class CursosSenacModel extends Conexao
{
    function fetchAll()
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM cursos_senac";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $res;
        } catch (PDOException $e) {
            throw new Exception("Falha ao Acessar Dados.");
        }
    }


    public function fetch($id)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare("SELECT * FROM cursos_senac WHERE id_curso_senac = :id_curso_senac");
            $stmt->bindParam(":id_curso_senac", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw new Exception("Falha ao Acessar Dados por ID: {$id}.");
        }
    }


    public function create($dados)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare("INSERT INTO cursos_senac (nome_curso_senac, codigo) VALUES (:nome_curso_senac, :codigo)");
            $stmt->execute($dados);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Falha ao Inserir cursos_senac", 1);
        }
    }


    public function delete($id_curso)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare("DELETE FROM cursos_senac WHERE id_curso_senac = :id_curso_senac");
            $stmt->bindParam(':id_curso_senac', $id_curso);
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
            $stmt = $this->conn->prepare("UPDATE cursos_senac SET nome_curso_senac = :nome_curso_senac, codigo = :codigo 
            WHERE id_curso_senac = :id_curso_senac"
            );
            $stmt->execute($dados);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Falha ao Excluir ID: {$dados['id_curso_senac']}");
        }
    }
}
