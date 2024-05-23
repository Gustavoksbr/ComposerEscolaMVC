<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Professor_turma;

use PDO;

class Professor_turmaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Professor_turma $professor_turma){
        try{
            $sql = "INSERT INTO professor_turma(id_professor,id_turma) VALUES ( :id_professor, :id_turma)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_professor", $professor_turma->getId_professor());
            $p->bindValue(":id_turma", $professor_turma->getId_turma());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id_p,$id_t){
        try{
            $sql = "DELETE FROM professor_turma WHERE id_professor = :id_p AND id_turma = :id_t";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_p", $id_p);
            $p->bindValue(":id_t", $id_t);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id_p, $id_t){
        try{
            $sql = "SELECT * FROM professor_turma WHERE id_professor = :id_p AND id_turma = :id_t";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_professor", $id_p);
            $p->bindValue(":id_turma", $id_t);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos()
    {
        try{
            $sql = "SELECT * FROM professor_turma";
            return $this->conexao->getConexao()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function pesquisar($substring)
    {
        try{
            $sql = "SELECT * FROM professor_turma WHERE CONCAT(id_professor,id_turma) LIKE :substring;";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':substring', '%' . $substring . '%', PDO::PARAM_STR);
            $p->execute();
            return $p->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(\Exception $e){
            return 0;
        }
    }

}