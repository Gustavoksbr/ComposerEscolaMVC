<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\alunoDAO;
use Php\Primeiroprojeto\Models\Domain\aluno;
use Php\Primeiroprojeto\Models\DAO\TurmaDAO;



class AlunoController
{

    public function index($params)
    {
        $mensagem = "";
        $pesquisa = "";
        $alunoDAO = new AlunoDAO();

        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";

        if (!isset($_POST['pesquisa'])) {
            $resultado = $alunoDAO->consultarTodos();
        } else {
            $pesquisa = $_POST['pesquisa'];
            $resultado = $alunoDAO->pesquisar($pesquisa);
        }

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
        $mensagem = "Encontrado ".sizeof($resultado). " registros";

        require_once ("../src/Views/aluno/aluno.php");
    }

    public function consultarTurmas()
    {
        $turmaDAO = new TurmaDAO();
        $listadados = $turmaDAO->consultarTodos();
        return $listadados;
    }

    public function inserir($params)
    {
        $dados = $this->consultarTurmas();
        require_once ("../src/Views/aluno/inserir_aluno.php");
    }

    public function novo($params)
    {
        $aluno = new Aluno($_POST['id'], $_POST['nome'], $_POST['turma']);
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->inserir($aluno)) {
            header("location: /aluno/inserir/true");
        } else {
            header("location: /aluno/inserir/false");
        }
    }

    public function alterar($params)
    {
        $alunoDAO = new alunoDAO();
        $resultado = $alunoDAO->consultar($params[1]);
        $dados = $this->consultarTurmas();
        require_once ("../src/Views/aluno/alterar_aluno.php");
    }

    public function alterando($params)
    {
        $aluno = new Aluno($_POST['id'], $_POST['nome'], $_POST['turma']);
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->alterar($aluno)) {
            header("location: /aluno/alterar/true");
        } else {
            header("location: /aluno/alterar/false");
        }
    }

    public function excluir($params)
    {
        $alunoDAO = new AlunoDAO();
        $resultado = $alunoDAO->consultar($params[1]);
        require_once ("../src/Views/aluno/excluir_aluno.php");
    }


    public function excluindo($params)
    {
        $alunoDAO = new AlunoDAO();
        if ($alunoDAO->excluir($_POST['id'])) {
            header("location: /aluno/excluir/true");
        } else {
            header("location: /aluno/excluir/false");
        }
    }
}
