<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\professorDAO;
use Php\Primeiroprojeto\Models\Domain\professor;

class ProfessorController
{
    public function index($params)
    {
        $professorDAO = new ProfessorDAO();
        $resultado = $professorDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if ($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif ($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif ($acao == "alterar" && $status == "true")
            $mensagem = "Registro alterado com sucesso!";
        elseif ($acao == "alterar" && $status == "false")
            $mensagem = "Erro ao alterar!";
        elseif ($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif ($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else
            $mensagem = "";
        require_once ("../src/Views/professor/professor.php");
    }

    public function inserir($params){
        require_once("../src/Views/professor/inserir_professor.html");
    }

    public function novo($params)
    {
        $professor = new Professor($_POST['id'], $_POST['nome'],$_POST['materia']);
        $professorDAO = new ProfessorDAO();
        if ($professorDAO->inserir($professor)){
            header("location: /professor/inserir/true");
        } else {
            header("location: /professor/inserir/false");
        }
    }
    public function alterar($params)
    {
        $professorDAO = new ProfessorDAO();
        $resultado = $professorDAO->consultar($params[1]);
        require_once ("../src/Views/professor/alterar_professor.php");
    }
    public function alterando($params)
    {
        $professor = new Professor($_POST['id'], $_POST['nome'], $_POST['materia']);
        $professorDAO = new professorDAO();
        if ($professorDAO->alterar($professor)) {
            header("location: /professor/alterar/true");
        } else {
            header("location: /professor/alterar/false");
        }
    }
    public function excluir($params)
    {
        $professorDAO = new professorDAO();
        $resultado = $professorDAO->consultar($params[1]);
        require_once ("../src/Views/professor/excluir_professor.php");
    }
    public function excluindo($params)
    {
        $professorDAO = new professorDAO();
        if ($professorDAO->excluir($_POST['id'])) {
            header("location: /professor/excluir/true");
        } else {
            header("location: /professor/excluir/false");
        }
    }
}
