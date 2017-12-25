<?php
require "../autoload.php";

use ChainOfResponsability\Monitor;
use ChainOfResponsability\Diretor;
use ChainOfResponsability\Professor;
use ChainOfResponsability\Coordenador;

class Main {

    public static function run() {
        $monitor     = new Monitor();
        $professor   = new Professor();
        $coordenador = new Coordenador();
        $diretor     = new Diretor();
        
        $monitor->nextHandler($professor);
        $professor->nextHandler($coordenador);
        $coordenador->nextHandler($diretor);
        
        $monitor->occorencia(1);
        $monitor->occorencia(2);
        $monitor->occorencia(3);
        $monitor->occorencia(4);
    }
}

Main::run();