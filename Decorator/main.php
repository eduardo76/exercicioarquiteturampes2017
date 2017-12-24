<?php
require_once "../autoload.php";

use Decorator\Aluno;
use Decorator\Escola;
use Decorator\EscolaComBusca;
use Decorator\ListaInvertidaDecorator;


class Main {

    public static function run() {
        
        $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3 = new Aluno(3, "Beltrano", "7777-7777");
        $aluno4 = new Aluno(4, "Betania", "5555-5555");
        
        $escola = new Escola();
        
        $escola->adicionarAluno($aluno1);
        $escola->adicionarAluno($aluno2);
        $escola->adicionarAluno($aluno3);
        $escola->adicionarAluno($aluno4);
        
        // Escola com Busca Decorator
        $escolaDecorator = new EscolaComBusca($escola);
        $alunos = $escolaDecorator->buscar("B");
        foreach($alunos as $aluno) {
            echo $aluno->toString();
        }
        
        echo "============================" . PHP_EOL;
        
        // Escola Invertida Decorator
        $escolaInvertida = new ListaInvertidaDecorator($escola);
        $alunos = $escolaInvertida->inverter("B");
        foreach($alunos as $aluno) {
            echo $aluno->toString();
        }
    }
}

Main::run();