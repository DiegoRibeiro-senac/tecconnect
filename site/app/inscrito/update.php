<?php
require_once '../templates/header.php';
require_once '../models/CursoModel.php';
require_once '../models/InscritoModel.php';
require_once '../models/CursosSenacModel.php';

$CursoModel = new CursoModel();
$InscritoModel = new InscritoModel();
$CursosSenacModel = new CursosSenacModel();
$cursos_senac = $CursosSenacModel->fetchAll();
$cursos = $CursoModel->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_inscrito = $_GET['id'];

        if ($inscricao = $InscritoModel->fetch($id_inscrito)) {
            null;
        }

        if (empty($inscricao)) {
            echo "<div class='m-3 text-danger'>Inscrição não encontrada.</div>";
            exit;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_completo = $_POST['nome_completo'];
    $id_curso_senac = $_POST['id_curso_senac'];
    $id_curso = $_POST['id_curso'];
    $turno = $_POST['turno'];
    $id_inscrito = $_POST['id_inscrito'];

    $dados = [
        'nome_completo' => $nome_completo,
        'fk_id_curso_senac' => $id_curso_senac,
        'fk_id_curso' => $id_curso,
        'turno' => $turno,
        'id_inscrito' => $id_inscrito
    ];

    if ($InscritoModel->update($dados)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Atualizado com sucesso!</strong>
          <a class="btn btn-success mx-3" href="./listar.php">Retornar</a>
          </div>';
    } else {
        echo 'Erro ao atualizar inscrição.';
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha na Inscrição: </strong>Erro ao atualizar inscrição.
            <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
        </div>';
    }
    exit;
}
?>

<div class="container">
    <div class="row">
        <form action="./update.php" method="post" class="col-12 col-12 col-md-6 col-xl-4 mx-auto gap-3 border bg-light mt-3 p-2 rounded rounded-3">
            <input type="number" name="id_inscrito" hidden value="<?= $inscricao->id_inscrito ?>">
            <legend class="mt-3">Atualizar Inscrição</legend>
            <div class="mt-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="nome_completo" name="nome_completo" value="<?= $inscricao->nome_completo ?>">
                    <label for="floatingInput">Nome Completo</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_curso_senac">
                        <option value="" selected>Selecione</option>
                        <?php foreach ($cursos_senac as $curso) : ?>
                            <?php if ($curso->id_curso_senac === $inscricao->fk_id_curso_senac) : ?>
                                <option value="<?= $curso->id_curso_senac ?>" class="text-center text-capitalize" selected><?= $curso->nome_curso_senac . ' - ' . $curso->codigo ?></option>
                            <?php else : ?>
                                <option value="<?= $curso->id_curso_senac ?>" class="text-center text-capitalize"><?= $curso->nome_curso_senac . ' - ' . $curso->codigo ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Curso que Pertece</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_curso">
                        <?php foreach ($cursos as $curso) : ?>
                            <?php if ($curso->id_curso === $inscricao->fk_id_curso) : ?>
                                <option value="<?= $curso->id_curso ?>" class="text-center text-capitalize" selected><?= $curso->nome_curso ?></option>
                            <?php else : ?>
                                <option value="<?= $curso->id_curso ?>" class="text-center text-capitalize"><?= $curso->nome_curso ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Curso Desejado</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="turno">
                        <option value="" selected>Selecione</option>
                        <?php $turnos = array('Matutino', 'Vespertino', 'Noturno'); ?>
                        <?php foreach ($turnos as $turno) : ?>
                            <?php if ($turno === $inscricao->turno) : ?>
                                <option selected value="<?= $turno ?>"><?= $turno ?></option>
                            <?php else : ?>
                                <option value="<?= $turno ?>"><?= $turno ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Turno</label>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
</div>

<style>
    label {
        text-transform: capitalize;
    }
</style>