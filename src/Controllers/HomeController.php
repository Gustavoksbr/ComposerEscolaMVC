<?php

namespace Php\Primeiroprojeto\Controllers;

class HomeController
{
    public function index($params)
    {
        require_once ("../src/Views/home/home.php");
    }
}
