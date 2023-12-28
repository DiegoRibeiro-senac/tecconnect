<?php
require_once '../templates/header.php';
require_once '../models/CursoModel.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ID não Fornecido.</strong></div>';
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_curso = $_GET['id'];
        $cursoModel = new CursoModel();

        try {
            $cursoModel->delete($id_curso);
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Excluído com sucesso!</strong></div>';
        } catch (Exception $e) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha na Exclusão. ' . $e->getMessage() . '</strong></div>';
        }
    }
}
?> <a class="btn btn-primary m-2" href="./listar.php">Retornar</a>