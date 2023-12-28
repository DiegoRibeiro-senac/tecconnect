<?php
require_once '../templates/header.php';
require_once '../models/CursoModel.php';

echo $_SERVER['PATH_TO_SITE'];

try {
    $cursoModel = new CursoModel();
    $cursos = $cursoModel->fetchAll();
} catch (\Exception $th) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Falha ao Carregar Dados.</strong>
    <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
    </div>';
    exit;
}

?>

<body>
    <div class="container-fluid container-xl">
        <div class="row">
            <div class="col-9 offset-1">
                <h3 class="my-3 text-capitalize">Cursos TEC CONNECT</h3>
                <table class="col table table-striped">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Data do Evento</th>
                            <th>Prazo de Inscrição</th>
                            <th>Hora Início</th>
                            <th>Término</th>
                            <th>Vagas</th>
                            <th>Disponíveis</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($cursos) > 0) : ?>
                            <?php foreach ($cursos as $curso) : ?>
                                <tr>
                                    <td><?= $curso->nome_curso ?></td>
                                    <td><?= $dataFormatada = date('d/m/Y', strtotime($curso->data)); ?></td>
                                    <td><?= $dataFormatada = date('d/m/Y', strtotime($curso->prazo_de_inscricao)); ?></td>
                                    <td><?= $curso->hora_inicio ?></td>
                                    <td><?= $curso->hora_fim ?></td>
                                    <td><?= $curso->num_vagas ?></td>
                                    <td><?= $curso->vagas_disponiveis ?></td>
                                    <td class="">
                                        <a class="mx-auto btn btn-outline-primary me-1" href="./update.php?id=<?= $curso->id_curso ?>"><i class="bi bi-pencil"></i></a>
                                        <a class="mx-auto btn btn-outline-danger" href="./delete.php?id=<?= $curso->id_curso ?>"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-bg-danger">Sem resultados. </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>