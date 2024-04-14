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
            $sql = "INSERT INTO professor VALUES (:id, :nome, :materia)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $professor->getId());
            $p->bindValue(":nome", $professor->getNome());
            $p->bindValue(":materia", $professor->getMateria());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar()
    {

            $sql = "SELECT * FROM professor";
            $stm = $this->conexao->getConexao()->query($sql);
            return $stm->fetchAll(PDO::FETCH_ASSOC);

    }
}