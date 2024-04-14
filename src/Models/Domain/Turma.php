<?php

namespace Php\Primeiroprojeto\Models\Domain;

class turma{

    private $id;
    private $turno;

    public function __construct($id, $turno){
        $this->setId($id);
        $this->setTurno($turno);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function setTurno($turno){
        $this->turno = $turno;
    }

}