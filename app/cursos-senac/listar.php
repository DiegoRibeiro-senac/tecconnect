<?php
require_once '../templates/header.php';
require_once '../models/CursosSenacModel.php';


try {
    $cursoSenacModel = new CursosSenacModel();
    $cursos_senac = $cursoSenacModel->fetchAll();
} catch (\Exception $e) {
    echo
    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERRO: </strong>' . $e->getMessage() . '
    <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
    </div>';
    exit;
}
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h3 class="my-3 text-capitalize">Cursos da Instituição</h3>
                <table class="col table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Código</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($cursos_senac) > 0) : ?>
                            <?php foreach ($cursos_senac as $curso_senac) : ?>
                                <tr>
                                    <td><?= $curso_senac->id_curso_senac ?></td>
                                    <td><?= $curso_senac->nome_curso_senac ?></td>
                                    <td><?= $curso_senac->codigo ?></td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-primary me-1" href="./update.php?id=<?= $curso_senac->id_curso_senac ?>"><i class="bi bi-pencil"></i></a>
                                        <a class="btn btn-outline-danger" href="./delete.php?id=<?= $curso_senac->id_curso_senac ?>"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-danger">Sem resultados. </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>