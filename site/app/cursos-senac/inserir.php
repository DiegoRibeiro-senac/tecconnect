<?php
require_once '../templates/header.php';
require_once '../models/CursosSenacModel.php';


$cursosSenacModel = new CursosSenacModel();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_curso_senac = $_POST['nome_curso_senac'];
    $codigo = $_POST['codigo'];

    $dados = [
        'nome_curso_senac' => $nome_curso_senac,
        'codigo' => $codigo,
    ];

    try {
        $cursosSenacModel->create($dados);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Cursos SENAC realizada com sucesso!</strong>
          <a class="btn btn-success mx-3" href="./listar.php">Retornar</a>
          </div>';
        exit;
    } catch (\Exception $e) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha na Cursos SENAC: </strong>' . $e->getMessage() . '
            <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
        </div>';
        exit;
    }
}
?>
<div class="container">
    <div class="row">
        <form action="./inserir.php" method="post" class="col-12 col-12 col-md-6 col-xl-4 mx-auto gap-3 border bg-light mt-3 p-2 rounded rounded-3">
            <legend class="mt-3">Cursos SENAC</legend>
            <div class="mt-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="nome_curso_senac" name="nome_curso_senac" id="nome_curso_senac">
                    <label for="floatingInput">Nome Curso SENAC</label>
                </div>
            </div>
            <div class="mt-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="codigo" name="codigo" id="codigo">
                    <label for="floatingInput">Codigo</label>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>
    </div>
</div>

</html>