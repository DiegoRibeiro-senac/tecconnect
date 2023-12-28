<?php
require_once '../templates/header.php';
require_once '../models/CursoModel.php';
require_once '../models/InscritoModel.php';


$CursoModel = new CursoModel();
$InscritoModel = new InscritoModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fk_id_curso = $_POST['fk_id_curso'];

    if (isset($fk_id_curso) && !empty($fk_id_curso)) {
        $inscritos = $InscritoModel->fetchByCourse($fk_id_curso);
    } else {
        $inscritos = $InscritoModel->fetchAll();
    }
} else {
    $inscritos = $InscritoModel->fetchAll();
}
$cursos = $CursoModel->fetchAll();

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="./listar.php" method="post" class="mt-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="h3">Filtrar Por:</p>
                            <select class="form-control col-3" name="fk_id_curso">
                                <option value="" class="text-center text-capitalize" selected>Curso Pretendido</option>
                                <?php foreach ($cursos as $curso) : ?>
                                    <option value="<?= $curso->id_curso ?>"><?= $curso->nome_curso ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <input class="btn btn-primary my-2" type="submit" value="Filtrar">
                        </div>
                    </div>
                    <hr>
                </form>
                <h3 class="my-3 text-capitalize">Inscrições</h3>
                <table class="col table table-striped">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Nome Completo</th>
                            <th>Curso Senac</th>
                            <th>Curso</th>
                            <th>Turno</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($inscritos) > 0) : ?>
                            <?php $i = 1;
                            foreach ($inscritos as $inscricao) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $inscricao->nome_completo ?></td>
                                    <td><?= $inscricao->nome_curso_senac ?></td>
                                    <td><?= $inscricao->nome_curso ?></td>
                                    <td><?= $inscricao->turno ?></td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-primary me-1" href="./update.php?id=<?= $inscricao->id_inscrito ?>"><i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-outline-danger" href="./delete.php?id=<?= $inscricao->id_inscrito ?>"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Sem resultados. </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>