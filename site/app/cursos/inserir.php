<?php
require_once '../templates/header.php';
require_once '../models/CursoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $x = new CursoModel();
    $nome_curso = $_POST['nome_curso'];
    $data = $_POST['data'];
    $prazo_de_inscricao = $_POST['prazo_de_inscricao'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $num_vagas = $_POST['num_vagas'];
    $vagas_disponiveis = $_POST['vagas_disponiveis'];

    $curso = [
        'nome_curso' => $nome_curso,
        'data' => $data,
        'prazo_de_inscricao' => $prazo_de_inscricao,
        'hora_inicio' => $hora_inicio,
        'hora_fim' => $hora_fim,
        'num_vagas' => $num_vagas,
        'vagas_disponiveis' => $vagas_disponiveis,
    ];

    try {
        if ($x->create($curso)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Curso adicionado com sucesso!</strong>
              <a class="btn btn-success mx-3" href="./listar.php">Retornar</a>
              </div>';
            exit;
        }
        throw new Exception();
    } catch (\Exception $e) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Falha na Inserção: </strong>' . $e->getMessage() . '
            <a class="btn btn-danger mx-3" href="./listar.php">Retornar</a>
        </div>';
        exit;
    }
}
?>

<div class="container">
    <div class="row">
        <form action="./inserir.php" method="post" class="col-12 col-12 col-md-6 col-xl-4 mx-auto gap-3 border bg-light mt-3 p-2 rounded rounded-3">
            <h3>TEC CONNECT EVENT</h3>
            <div class="mt-3">
                <label class="form-label" for="nome_curso">Nome Curso</label><br>
                <input class="form-control" type="text" name="nome_curso" id="nome_curso">
            </div>
            <hr>
            <p class="display-6" style="font-size: 1.5rem">Data:</p>
             <div class="mt-3 row">
                <div class="col-6">
                    <label class="form-label" for="data">Evento</label><br>
                    <input class="form-control" type="date" name="data" id="data">
                </div>
                <div class="col-6">
                    <label class="form-label" for="prazo_de_inscricao">Prazo de Inscrição</label><br>
                    <input class="form-control" type="date" name="prazo_de_inscricao" id="prazo_de_inscricao">
                </div>
            </div>
            <hr>
            <p class="display-6" style="font-size: 1.5rem">Horário:</p>
            <div class="mt-3 row">
                <div class="col-6">
                    <label class="form-label" for="hora_inicio">Início</label><br>
                    <input class="form-control" type="time" name="hora_inicio" id="hora_inicio">
                </div>
                <div class="col-6">
                    <label class="form-label" for="hora_fim">Término</label><br>
                    <input class="form-control" type="time" name="hora_fim" id="hora_fim">
                </div>
            </div>
            <hr>
            <p class="display-6" style="font-size: 1.5rem">Vagas:</p>
            <div class="mt-3 row">
                <div class="col-6">
                    <label class="form-label" for="num_vagas">Totais</label><br>
                    <input class="form-control" type="number" name="num_vagas" id="num_vagas">
                </div>
                <div class="col-6">
                    <label class="form-label" for="vagas_disponiveis">Disponíveis</label><br>
                    <input class="form-control" type="number" name="vagas_disponiveis" id="vagas_disponiveis">
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form> 
    </div>
</div>

</html>