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
            $sql = "INSERT INTO turma(id,turno) VALUES (:id, :turno)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $turma->getId());
            $p->bindValue(":turno", $turma->getTurno());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar()
    {

            $sql = "SELECT * FROM turma";
            $stm = $this->conexao->getConexao()->query($sql);
            return $stm->fetchAll(PDO::FETCH_ASSOC);

    }

}