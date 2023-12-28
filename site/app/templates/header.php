<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<header class="text-center container mx-auto mt-3">
  <ul class="nav">
    <div class="dropdown">
      <button class="btn m-1 btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Listar...
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../cursos-senac/listar.php">Cursos SENAC</a></li>
        <li><a class="dropdown-item" href="../cursos/listar.php">Cursos TEC-CONNECT</a></li>
        <li><a class="dropdown-item" href="../inscrito/listar.php">Inscrições</a></li>
      </ul>
    </div>
    <div class="dropdown">
      <button class="btn m-1 btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Inserir um novo...
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../cursos-senac/inserir.php">Curso SENAC</a></li>
        <li><a class="dropdown-item" href="../cursos/inserir.php">Curso TEC-CONNECT</a></li>
        <li><a class="dropdown-item" href="../inscrito/inserir.php">Inscrição</a></li>
      </ul>
    </div>
  </ul>
</header>