<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\professorDAO;
use Php\Primeiroprojeto\Models\Domain\professor;

class ProfessorController{

    public function inserir($params){
        require_once("../src/Views/professor/inserir_professor.html");
    }

    public function novo($params){
        $professor = new professor($_POST['id'], $_POST['nome'],$_POST['materia']);
        $professorDAO = new professorDAO();
        if ($professorDAO->inserir($professor)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
