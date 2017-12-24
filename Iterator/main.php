<?php
require_once "../autoload.php";

use Iterator\Aluno;
use Iterator\Escola;

class Main {

    public static function run() {
        
        $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3 = new Aluno(3, "Beltrano", "7777-7777");
        
        $escola = new Escola();
        
        $escola->adicionarAluno($aluno1);
        $escola->adicionarAluno($aluno2);
        $escola->adicionarAluno($aluno3);
        
        $escolaIterator = $escola->createIterator();
        
        $aluno = $escolaIterator->first();
        echo $aluno->toString();
        
        $aluno = $escolaIterator->next();
        echo $aluno->toString();
        
        $aluno = $escolaIterator->current();
        echo $aluno->toString();
        
        $aluno = $escolaIterator->next();
        echo $aluno->toString();
        
        $aluno = $escolaIterator->first();
        echo $aluno->toString();
        
        while (!$escolaIterator->isDone()) {
            $aluno = $escolaIterator->next();
            echo $aluno->toString();
        }
    }
}

Main::run();