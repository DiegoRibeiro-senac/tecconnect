<?php
require_once '../models/CursoModel.php';
require_once '../models/InscritoModel.php';


class InscritoController
{
    private $InscritoModel;
    private $CursoModel;
    public function __construct()
    {
        $this->InscritoModel = new InscritoModel();
        $this->CursoModel = new CursoModel();
    }

    public function create($dados)
    {
        try {
            $InscritoExists = $this->InscritoModel->checkIfInscritoExists($dados);

            if ($InscritoExists) {
                return json_encode(array('error' => 'Inscrição já existente!'));
            }

            $id_curso = $dados['fk_id_curso'];
            $vagas_disponiveis = $this->CursoModel->getNumVagas($id_curso);

            if ($vagas_disponiveis === 0) {
                return json_encode(array('error' => 'Sem vagas disponíveis para este curso!'));
            }

            if ($vagas_disponiveis >= 1) {
                $wasInserted = $this->InscritoModel->create($dados);
                if ($wasInserted) return json_encode(array('success' => 'Inscrição realizada com sucesso!'));
            }
            throw new Exception("Error Processing Request", 1);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);
        }
    }
}