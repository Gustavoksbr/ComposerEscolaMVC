<?php

namespace Php\Primeiroprojeto\Models\Domain;

class professor{

    private $id;
    private $nome;
    private $materia;

    public function __construct($id, $nome, $materia){
        $this->setId($id);
        $this->setNome($nome);
        $this->setMateria($materia);
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
    public function getMateria(){
        return $this->materia;
    }

    public function setMateria($materia){
        $this->materia = $materia;
    }

}