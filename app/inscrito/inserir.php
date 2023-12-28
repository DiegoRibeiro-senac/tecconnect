<?php
require_once '../templates/header.php';
require_once '../models/CursosSenacModel.php';
require_once '../controllers/InscritoControler.php';


$cursoModel = new CursoModel();
$cursosSenacModel = new CursosSenacModel();
$InscritoController = new InscritoController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $id_curso_senac = $_POST['id_curso_senac'];
    $id_curso = $_POST['id_curso'];
    $turno = $_POST['turno'];

    $dados = [
        'nome_completo' => $nome_completo,
        'fk_id_curso_senac' => $id_curso_senac,
        'fk_id_curso' => $id_curso,
        'turno' => $turno,
    ];

    try {
        $InscritoController->create($dados);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Inscrição realizada com sucesso!</strong>
          <a class="btn btn-success mx-3" href="./listar.php">Retornar</a>
          </div>';
        exit;
    } catch (Exception $e) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha na Inscrição: </strong>' . $e->getMessage() . '
            <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
        </div>';
        exit;
    }
}



try {
    $cursos_senac = $cursosSenacModel->fetchAll();
    $cursos = $cursoModel->fetchAll();
} catch (Exception $th) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha ao Processar Formulário. Tente Novamente!</strong>
            <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
        </div>';
    exit;
}


?><div class="container">
    <div class="row">
        <form action="./inserir.php" method="post" class="col-12 col-12 col-md-6 col-xl-4 mx-auto gap-3 border bg-light mt-3 p-2 rounded rounded-3">
            <legend class="mt-3">Inscrições TEC CONNECT</legend>
            <div class="mt-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="nome_completo" name="nome_completo">
                    <label for="floatingInput">Nome Completo</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_curso">
                        <option value="" selected>Selecione</option>
                        <?php foreach ($cursos as $curso) : ?>
                            <?php if ($curso->vagas_disponiveis >= 1) : ?>
                                <option value="<?= $curso->id_curso ?>"><?= $curso->nome_curso ?></option>
                            <?php else : ?>
                                <option disabled value="<?= $curso->id_curso ?>"><?= $curso->nome_curso ?> - Sem vagas!</option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Curso Desejado</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_curso_senac">
                        <option value="" selected>Selecione</option>
                        <?php foreach ($cursos_senac as $curso) : ?>
                            <option value="<?= $curso->id_curso_senac ?>"><?= $curso->nome_curso_senac . ' - ' . $curso->codigo ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Curso que Pertece</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="turno">
                        <option value="" selected>Selecione</option>
                        <?php $turnos = array('Matutino', 'Vespertino', 'Noturno'); ?>
                        <?php foreach ($turnos as $turno) : ?>
                            <option value="<?= $turno ?>"><?= $turno ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="floatingSelect">Turno</label>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Cadastar</button>
            </div>
        </form>
    </div>
</div>


<style>
    #inscricao_form label {
        text-transform: capitalize;
    }
</style>