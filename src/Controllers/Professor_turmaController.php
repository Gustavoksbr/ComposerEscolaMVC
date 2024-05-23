<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\professor_turmaDAO;
use Php\Primeiroprojeto\Models\Domain\professor_turma;
use Php\Primeiroprojeto\Models\DAO\professorDAO;
use Php\Primeiroprojeto\Models\DAO\turmaDAO;


class Professor_turmaController{

    public function index($params)
    {
        $mensagem = "";
        $pesquisa = "";
        $professor_turmaDAO = new Professor_turmaDAO();
        
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";

        if (!isset($_POST['pesquisa'])) {
            $resultado = $professor_turmaDAO->consultarTodos();
        } else {
            $pesquisa = $_POST['pesquisa'];
            $resultado = $professor_turmaDAO->pesquisar($pesquisa);
        }
        if ($acao == "inserir" && $status == "true")
            $mensagem = "Registro inserido com sucesso!";
        elseif ($acao == "inserir" && $status == "false")
            $mensagem = "Erro ao inserir!";
        elseif ($acao == "excluir" && $status == "true")
            $mensagem = "Registro excluído com sucesso!";
        elseif ($acao == "excluir" && $status == "false")
            $mensagem = "Erro ao excluir!";
        else
            $mensagem = "Encontrado ".sizeof($resultado). " registros";
        require_once ("../src/Views/professor_turma/professor_turma.php");
    }
    public function consultarProfessores()
    {
        $professorDAO = new ProfessorDAO();
        $listadados = $professorDAO->consultarTodos();
        return $listadados;
    }
    public function consultarTurmas()
    {
        $turmaDAO = new TurmaDAO();
        $listadados = $turmaDAO->consultarTodos();
        return $listadados;
    }

    
    public function inserir($params){
        $dados_p = $this->consultarProfessores();
        $dados_t = $this->consultarTurmas();
        require_once("../src/Views/professor_turma/inserir_professor_turma.php");
    }

    public function novo($params){
        $professor_turma = new Professor_turma($_POST['id_professor'], $_POST['id_turma']);
        $professor_turmaDAO = new Professor_turmaDAO();
        if ($professor_turmaDAO->inserir($professor_turma)){
            header("location: /professor_turma/inserir/true");
        } else {
            header("location: /professor_turma/inserir/false");
        }
    }

    public function excluir($params)
    {
        $professor_turmaDAO = new professor_turmaDAO();
        $resultado = $professor_turmaDAO->consultar($params[1],$params[2]);
        $resultadop = $params[1];
        $resultadot = $params[2];
        require_once ("../src/Views/professor_turma/excluir_professor_turma.php");
    }
    public function excluindo($params)
    {
        $professor_turmaDAO = new professor_turmaDAO();
        if ($professor_turmaDAO->excluir($_POST['id_professor'],$_POST['id_turma'])) {
            header("location: /professor_turma/excluir/true");
        } else {
            header("location: /professor_turma/excluir/false");
        }
    }

}
