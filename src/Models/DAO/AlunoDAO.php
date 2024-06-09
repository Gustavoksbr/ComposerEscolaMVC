<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Aluno;

use PDO;

class AlunoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Aluno $aluno){
        try{
            $sql = "INSERT INTO aluno(id,nome,turma) VALUES (:id, :nome, :turma)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $aluno->getId());
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":turma", $aluno->getTurma());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
    
    public function alterar(Aluno $aluno){
        try{
            $sql = "UPDATE aluno SET id = :idnovo, nome = :nome, turma = :turma
                    WHERE id = :idantigo";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":idnovo", $aluno->getId());
            $p->bindValue(":nome", $aluno->getNome());
            $p->bindValue(":turma", $aluno->getTurma());
            $p->bindValue(":idantigo",$_SESSION['idantigo']);
            unset($_SESSION['idantigo']);
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM aluno WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM aluno WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos()
    {
        try{
            $sql = "SELECT * FROM aluno";
            return $this->conexao->getConexao()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function pesquisar($substring)
    {
        try{
            $sql = "SELECT * FROM aluno WHERE CONCAT(id,nome,turma) LIKE :substring;";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':substring', '%' . $substring . '%', PDO::PARAM_STR);
            $p->execute();
            return $p->fetchAll(PDO::FETCH_ASSOC);
        } catch(\Exception $e){
            return false;
        }
    }

}