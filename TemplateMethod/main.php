<?php

require_once '../autoload.php';

use TemplateMethod\Aluno;
use TemplateMethod\EscolaAbstrata;
use TemplateMethod\Escola;

class Main {

    public static function run() {
        $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3 = new Aluno(3, "Beltrano", "7777-7777");
        
        $escola = new Escola();
        
        $escola->adicionarAluno($aluno1);
        $escola->adicionarAluno($aluno2);
        $escola->adicionarAluno($aluno3);
        
        $escola->printAlunos();
    }
}

Main::run();