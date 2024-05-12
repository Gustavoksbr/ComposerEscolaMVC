<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\turmaDAO;
use Php\Primeiroprojeto\Models\Domain\turma;

class TurmaController
{
    public function index($params)
    {
        $turmaDAO = new TurmaDAO();
        $resultado = $turmaDAO->consultarTodos();
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
        require_once ("../src/Views/turma/turma.php");
    }

    public function inserir($params)
    {
        require_once ("../src/Views/turma/inserir_turma.html");
    }

    public function novo($params)
    {
        $turma = new Turma($_POST['id'], $_POST['nome'], $_POST['turno']);
        $turmaDAO = new TurmaDAO();
        if ($turmaDAO->inserir($turma)) {
            header("location: /turma/inserir/true");
        } else {
            header("location: /turma/inserir/false");
        }
    }
    public function alterar($params)
    {
        $turmaDAO = new TurmaDAO();
        $resultado = $turmaDAO->consultar($params[1]);
        require_once ("../src/Views/turma/alterar_turma.php");
    }
    public function alterando($params)
    {
        $turma = new Turma($_POST['id'], $_POST['nome'], $_POST['turno']);
        $turmaDAO = new TurmaDAO();
        if ($turmaDAO->alterar($turma)) {
            header("location: /turma/alterar/true");
        } else {
            header("location: /turma/alterar/false");
        }

    }
    public function excluir($params)
    {
        $turmaDAO = new TurmaDAO();
        $resultado = $turmaDAO->consultar($params[1]);
        require_once ("../src/Views/turma/excluir_turma.php");
    }
    public function excluindo($params)
    {
        $turmaDAO = new TurmaDAO();
        if ($turmaDAO->excluir($_POST['id'])) {
            header("location: /turma/excluir/true");
        } else {
            header("location: /turma/excluir/false");
        }
    }
}
