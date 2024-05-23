<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Professor;

use PDO;

class ProfessorDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Professor $professor){
        try{
            $sql = "INSERT INTO professor(id,nome,materia) VALUES (:id, :nome, :materia)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $professor->getId());
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":materia", $professor->getMateria());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Professor $professor){
        try{
            $sql = "UPDATE professor SET nome = :nome, materia = :materia
                    WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $professor->getId());
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":materia", $professor->getMateria());
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM professor WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM professor WHERE id = :id";
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
            $sql = "SELECT * FROM professor";
            return $this->conexao->getConexao()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch(\Exception $e){
            return 0;
        }
    }

    
    public function pesquisar($substring)
    {
        try{
            $sql = "SELECT * FROM professor WHERE CONCAT(id,nome,materia) LIKE :substring;";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(':substring', '%' . $substring . '%', PDO::PARAM_STR);
            $p->execute();
            return $p->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(\Exception $e){
            return 0;
        }
    }
}