<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Aluno;

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

}