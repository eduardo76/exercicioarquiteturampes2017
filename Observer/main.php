<?php
require_once "../autoload.php";

use Observer\Aluno;
use Observer\Escola;
use Observer\Catraca;
use Observer\Biblioteca;

class Main {
    
    public static function run() {
        $aluno1     = new Aluno(1, "Fulano", "8888-8888");
        $aluno2     = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3     = new Aluno(3, "Beltrano", "7777-7777");
        
        $escola     = new Escola();
        $biblioteca = new Biblioteca();
        $catraca    = new Catraca();
        
        $escola->attach($biblioteca);
        $escola->attach($biblioteca);
        $escola->attach($catraca);
        
        $escola->adicionarAluno($aluno1);
        $escola->adicionarAluno($aluno2);
        $escola->adicionarAluno($aluno3);
        
        $escola->removerAluno($aluno2, "Remova Aluno");
    }
}

Main::run();