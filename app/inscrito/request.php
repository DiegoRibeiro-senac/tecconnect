<?php
require_once '../controllers/InscritoControler.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://tecconnect.website.com');
header('Access-Control-Allow-Headers: content-type');


$body = file_get_contents("php://input");
$data = json_decode($body, true);

$dados = array(
    'nome_completo' => $data['nome_completo'],
    'fk_id_curso_senac' => $data['fk_id_curso_senac'],
    'fk_id_curso' => $data['fk_id_curso'],
    'turno' => $data['turno']
);

$Inscrito = new InscritoController();
$response = $Inscrito->create($dados);

echo $response;
