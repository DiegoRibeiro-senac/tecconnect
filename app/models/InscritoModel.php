<?php
require_once '../database/Conexao.Class.php';


class InscritoModel extends Conexao
{
    public function checkIfInscritoExists($dados)
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM inscritos WHERE fk_id_curso_senac = :fk_id_curso_senac AND turno = :turno AND nome_completo = :nome_completo AND fk_id_curso = :fk_id_curso";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome_completo', $dados['nome_completo']);
            $stmt->bindParam(':fk_id_curso_senac', $dados['fk_id_curso_senac']);
            $stmt->bindParam(':fk_id_curso', $dados['fk_id_curso']);
            $stmt->bindParam(':turno', $dados['turno']);
            $stmt->execute();

            if ($stmt->rowCount() === 1) return true;
            return false;
            $this->db_close();
        } catch (PDOException $e) {
            return false;
        }
    }


    function fetch($id_inscrito)
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM inscritos WHERE id_inscrito = :id_inscrito";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_inscrito', $id_inscrito);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $inscrito = $res[0];
            $this->db_close();
            return $inscrito;
        } catch (Exception $e) {
            die('DB ERROR -> getInscritos(): ' . $e->getMessage());
        }
    }


    function fetchByCourse($fk_id_curso)
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM inscritos i
            join cursos c 
            ON i.fk_id_curso = c.id_curso
            JOIN cursos_senac c_s 
            ON i.fk_id_curso_senac = c_s.id_curso_senac WHERE fk_id_curso = :fk_id_curso";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':fk_id_curso', $fk_id_curso);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $res;
        } catch (Exception $e) {
            die('DB ERROR -> getInscritos(): ' . $e->getMessage());
        }
    }


    function fetchAll()
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM inscritos i
                    JOIN cursos c 
                    ON i.fk_id_curso = c.id_curso
                    JOIN cursos_senac c_s 
                    ON i.fk_id_curso_senac = c_s.id_curso_senac";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $res;
        } catch (Exception $e) {
            die('DB ERROR -> getNumVagas(): ' . $e->getMessage());
        }
    }


    function delete($id_inscrito, $id_curso)
    {
        try {
            $this->db_connect();
            $sql = "DELETE FROM inscritos WHERE id_inscrito = :id_inscrito";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_inscrito', $id_inscrito);
            $stmt->execute();

            $sql = "UPDATE cursos
            SET vagas_disponiveis = vagas_disponiveis + 1
            WHERE id_curso = :id_curso;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_curso', $id_curso);
            $stmt->execute();

            $this->db_close();
            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), 1);
        }
    }


    public function create($dados)
    {
        try {
            $this->db_connect();
            $stmt = $this->conn->prepare(
                "INSERT INTO inscritos (nome_completo, fk_id_curso, fk_id_curso_senac, turno)
                VALUES (:nome_completo, :fk_id_curso, :fk_id_curso_senac, :turno)"
            );

            $stmt->bindParam(':nome_completo', $dados['nome_completo']);
            $stmt->bindParam(':fk_id_curso', $dados['fk_id_curso']);
            $stmt->bindParam(':fk_id_curso_senac', $dados['fk_id_curso_senac']);
            $stmt->bindParam(':turno', $dados['turno']);

            if ($stmt->execute() === false) throw new PDOException("Falha ao inserir", 1);

            $this->db_connect();
            $decrement_vagas = "UPDATE cursos SET vagas_disponiveis = vagas_disponiveis - 1 WHERE id_curso = :id_curso";
            $stmt = $this->conn->prepare($decrement_vagas);
            $stmt->bindParam(':id_curso', $dados['fk_id_curso']);
            $stmt->execute();
            $this->db_close();
            if ($stmt->rowCount() > 0) return true;
            return false;
        } catch (PDOException $e) {
            throw new Exception("Falha ao inserir.");
        }
    }


    public function update($dados)
    {
        try {
            $this->db_connect();
            $sql = "UPDATE inscritos SET nome_completo = :nome_completo, fk_id_curso = :fk_id_curso, fk_id_curso_senac = :fk_id_curso_senac, turno = :turno WHERE id_inscrito = :id_inscrito;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome_completo', $dados['nome_completo']);
            $stmt->bindParam(':fk_id_curso_senac', $dados['fk_id_curso_senac']);
            $stmt->bindParam(':fk_id_curso', $dados['fk_id_curso']);
            $stmt->bindParam(':turno', $dados['turno']);
            $stmt->bindParam(':id_inscrito', $dados['id_inscrito']);

            if ($stmt->execute()) {
                $this->db_close();
                return true;
            }
            return false;
        } catch (Exception $e) {
            die('Não foi possível Atualizar! - ' . $e->getMessage());
        }
    }

    function preferenceByCourse()
    {
        try {
            $this->db_connect();
            $sql = "SELECT c_s.nome_curso_senac, c.nome_curso, COUNT(c_s.nome_curso_senac) alunos
            FROM inscritos i
            JOIN cursos c 
            ON i.fk_id_curso = c.id_curso
            JOIN cursos_senac c_s 
            ON i.fk_id_curso_senac = c_s.id_curso_senac
            GROUP BY c.nome_curso, c_s.nome_curso_senac";

            $stmt = $this->conn->query($sql);
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $res;
        } catch (Exception $e) {
            echo 'falha com o db'. $e->getMessage();
        }
    }
}
