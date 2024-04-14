<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\alunoDAO;
use Php\Primeiroprojeto\Models\Domain\aluno;
use Php\Primeiroprojeto\Models\DAO\TurmaDAO;


class AlunoController{
    
    public function inserir($params){
        $turmaDAO = new TurmaDAO();
        $dados = $turmaDAO->consultar();

        require_once("../src/Views/aluno/inserir_aluno.php");
    }

    public function novo($params){
        $aluno = new aluno($_POST['id'], $_POST['nome'],$_POST['turma']);
        $alunoDAO = new alunoDAO();
        if ($alunoDAO->inserir($aluno)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
