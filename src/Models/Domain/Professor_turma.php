<?php

namespace Php\Primeiroprojeto\Models\Domain;

class professor_turma{

    private $id_professor;
    private $id_turma;

    public function __construct($id_professor, $id_turma){
        $this->setId_professor($id_professor);
        $this->setId_turma($id_turma);
    }

    public function getId_professor(){
        return $this->id_professor;
    }

    public function setId_professor($id_professor){
        $this->id_professor = $id_professor;
    }

    public function getId_turma(){
        return $this->id_turma;
    }

    public function setId_turma($id_turma){
        $this->id_turma = $id_turma;
    }

}