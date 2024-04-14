<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\turmaDAO;
use Php\Primeiroprojeto\Models\Domain\turma;

class TurmaController{

    public function inserir($params){
        require_once("../src/Views/turma/inserir_turma.html");
    }

    public function consultar()
    {
        
    }

    public function novo($params){
        $turma = new turma($_POST['id'],$_POST['turno']);
        $turmaDAO = new turmaDAO();
        if ($turmaDAO->inserir($turma)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
