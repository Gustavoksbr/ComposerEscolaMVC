<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

//INSERIR PROFESSOR
$r->get('/professor/inserir',
    'Php\Primeiroprojeto\Controllers\ProfessorController@inserir');

$r->post('/professor/novo',
    'Php\Primeiroprojeto\Controllers\ProfessorController@novo');

//INSERIR TURMA
$r->get('/turma/inserir',
    'Php\Primeiroprojeto\Controllers\TurmaController@inserir');

$r->post('/turma/novo',
    'Php\Primeiroprojeto\Controllers\TurmaController@novo');

//INSERIR ALUNO
$r->get('/aluno/inserir',
    'Php\Primeiroprojeto\Controllers\AlunoController@inserir');

$r->post('/aluno/novo',
    'Php\Primeiroprojeto\Controllers\AlunoController@novo');

//INSERIR PROFESSOR_TURMA
$r->get('/professor_turma/inserir',
    'Php\Primeiroprojeto\Controllers\Professor_turmaController@inserir');

$r->post('/professor_turma/novo',
    'Php\Primeiroprojeto\Controllers\Professor_turmaController@novo');



#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}



