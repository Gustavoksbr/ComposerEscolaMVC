<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\professor_turmaDAO;
use Php\Primeiroprojeto\Models\Domain\professor_turma;
use Php\Primeiroprojeto\Models\DAO\professorDAO;
use Php\Primeiroprojeto\Models\DAO\turmaDAO;

class Professor_turmaController{

    public function inserir($params){
        $turmaDAO = new TurmaDAO();
        $dados_t = $turmaDAO->consultar();
        $professorDAO = new ProfessorDAO();
        $dados_p = $professorDAO->consultar();
        require_once("../src/Views/professor_turma/inserir_professor_turma.php");
    }

    public function novo($params){
        $professor_turma = new professor_turma($_POST['id_professor'], $_POST['id_turma']);
        $professor_turmaDAO = new professor_turmaDAO();
        if ($professor_turmaDAO->inserir($professor_turma)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
