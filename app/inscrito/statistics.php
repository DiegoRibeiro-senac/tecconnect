<?php
require_once '../models/InscritoModel.php';
require_once '../models/CursoModel.php';
require_once '../templates/header.php';


$InscritoModel = new InscritoModel();
$CursoModel = new CursoModel();
$cursos =  $CursoModel->fetchAll();
$cursos_preferencia =  $InscritoModel->preferenceByCourse();

$graphic = array();

foreach ($cursos_preferencia as $info) {
    $graphic[$info->nome_curso][$info->nome_curso_senac]['qtd'] = $info->alunos;
    $graphic[$info->nome_curso]['total'] += $graphic[$info->nome_curso][$info->nome_curso_senac]['qtd'];
}

// echo '<pre>';
// print_r($graphic);
// echo '</pre>';

?>


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <?php foreach ($cursos as $curso) : ?>
                <?php $curso = $curso->nome_curso; ?>
                <h3><?= $curso ?></h3>
                <ul>
                    <?php foreach ($graphic[$curso] as $curso_senac => $value) : ?>
                        <?php if ($curso_senac !== 'total') : ?>
                            <?php $total = $graphic[$curso]['total']; ?>
                            <?php $qtd = $graphic[$curso][$curso_senac]['qtd']; ?>
                            <?php $percent = $qtd * 100 / $total; ?>
                            <li><?= $curso_senac . ': ' . $percent . '% alunos: ' . $qtd ?>
                                <br>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (isset($total) && !empty($total)) : ?>
                            <li>Total de Inscrições: <?= $total ?></li>
                        <?php endif; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>



</html>