<?php

namespace DependencyInjection;

use DI\ContainerBuilder;
use DependencyInjection\Aluno;
use DependencyInjection\Escola;
use DependencyInjection\ILogger;
use DependencyInjection\ConsoleLogger;

class EscolaLogTeste {
    public $escola;
    public $consoleLogger;
    public $arquivoLogger;

    public static function executar() {

        // Aqui está sendo usado o PHP-DI, dependency injection container, que controla a injeção de dependência
        // Pode ser encontrado em: http://php-di.org/
        $container = ContainerBuilder::buildDevContainer();
        $container->set(ILogger::class, \DI\object(ConsoleLogger::class)); // Mapeia a interface para a classe concreta

        $escola = $container->get(Escola::class);

        $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3 = new Aluno(3, "Beltrano", "7777-7777");

        $escola->adicionarAluno($aluno1);
        $escola->adicionarAluno($aluno2);
        $escola->adicionarAluno($aluno3);
        
        $escola->printAlunos();

        $escola->removerAluno($aluno2);

        $escola->printAlunos();
    }
}