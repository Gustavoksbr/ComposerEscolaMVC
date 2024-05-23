<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Turma;

use PDO;

class TurmaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Turma $turma){
        try{
            $sql = "INSERT INTO turma(id,nome,turno) VALUES (:id, :nome, :turno)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $turma->getId());
            $p->bindValue(":nome", $turma->getNome());
            $p->bindValue(":turno", $turma->getTurno());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
    public function alterar(Turma $turma){
        try{
            $sql = "UPDATE turma SET nome = :nome, turno = :turno
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $turma->getId());
            $p->bindValue(":nome", $turma->getNome());
            $p->bindValue(":turno", $turma->getTurno());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM turma WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
    public function consultar($id){
        try{
            $sql = "SELECT * FROM turma WHERE id = :id";
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
            $sql = "SELECT * FROM turma";
            return $this->conexao->getConexao()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(\Exception $e){
            return 0;
        }
    }

    public function pesquisar($substring)
    {
        try{
            $sql = "SELECT * FROM turma WHERE CONCAT(id,nome,turno) LIKE :substring;";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':substring', '%' . $substring . '%', PDO::PARAM_STR);
            $p->execute();
            return $p->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(\Exception $e){
            return 0;
        }
    }

}