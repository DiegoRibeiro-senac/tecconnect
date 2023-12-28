<?php
require_once '../templates/header.php';
require_once '../models/CursoModel.php';
require_once '../models/InscritoModel.php';
require_once '../templates/header.php';


$InscritoModel = new InscritoModel();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_inscrito = $_GET['id'];

        if ($inscricao = $InscritoModel->fetch($id_inscrito)) {
            null;
        }

        if (!isset($inscricao)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Usuário Inexistente.</strong>' . $e->getMessage() . '
                <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
            </div>';
            exit;
        }

        $id_fk_id_curso = $inscricao->fk_id_curso;
        $id_inscrito = $inscricao->id_inscrito;
        try {
            $InscritoModel->delete($id_inscrito, $id_fk_id_curso);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Inscrição excluída com sucesso!</strong>
            <a class="btn btn-success mx-3" href="./listar.php">Retornar</a>
            </div>';

            exit;
        } catch (\Exception $e) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Falha na Exclusão: </strong>' . $e->getMessage() . '
                <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
            </div>';
            exit;
        }
    }
}
