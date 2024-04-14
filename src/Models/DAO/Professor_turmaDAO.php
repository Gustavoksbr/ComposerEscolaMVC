<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Professor_turma;

class Professor_turmaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Professor_turma $professor_turma){
        try{
            $sql = "INSERT INTO professor_turma VALUES ( :id_professor, :id_turma)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_professor", $professor_turma->getId_professor());
            $p->bindValue(":id_turma", $professor_turma->getId_turma());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}