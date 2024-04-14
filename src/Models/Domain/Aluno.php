<?php

namespace Php\Primeiroprojeto\Models\Domain;

class aluno{

    private $id;
    private $nome;
    private $turma;

    public function __construct($id, $nome, $turma){
        $this->setId($id);
        $this->setNome($nome);
        $this->setTurma($turma);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getTurma(){
        return $this->turma;
    }

    public function setTurma($turma){
        $this->turma = $turma;
    }

}