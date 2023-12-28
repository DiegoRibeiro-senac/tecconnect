<?php
require_once '../templates/header.php';
require_once '../models/CursosSenacModel.php';


$cursoSenacModel = new CursosSenacModel();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_curso_senac = $_GET['id'];

        if ($curso_senac = $cursoSenacModel->fetch($id_curso_senac)) {
            null;
        }

        if (!isset($curso_senac)) {
            echo "<div class='m-3 text-danger'>Inscrição não encontrada.</div>";
            exit;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_curso_senac = $_POST['nome_curso_senac'];
    $codigo = $_POST['codigo'];
    $id_curso_senac = $_POST['id_curso_senac'];

    $dados = [
        'nome_curso_senac' => $nome_curso_senac,
        'codigo' => $codigo,
        'id_curso_senac' => $id_curso_senac
    ];

    if ($cursoSenacModel->update($dados)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Atualizado com sucesso!</strong>
          <a class="btn btn-success mx-3" href="./listar.php">Retornar</a>
          </div>';
    } else {
        echo 'Erro ao atualizar.';
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha na Atualização: </strong>Erro ao atualizar
            <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
        </div>';
    }
    exit;
}
?>
<body>
    <div class="container">
        <form action="./update.php" method="post" class="row vstck gap-3  border bg-light col-4 offset-4 mt-3 p-2">
            <legend class="mt-3">Cursos SENAC</legend>
            <input type="number" hidden name="id_curso_senac" id="id_curso_senac" value="<?=$curso_senac->id_curso_senac?>">
            <div class="">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="nome_curso_senac" name="nome_curso_senac" id="nome_curso_senac"  value="<?=$curso_senac->nome_curso_senac?>">
                    <label for="floatingInput">Nome Curso SENAC</label>
                </div>
            </div>
            <div class="">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="codigo" name="codigo" id="codigo" value="<?=$curso_senac->codigo?>">
                    <label for="floatingInput">Codigo</label>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </div>
        </form>
    </div>
</body>

</html>