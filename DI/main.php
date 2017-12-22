<?php

require "vendor/autoload.php";

use DI\ContainerBuilder;

interface ILogger {
    public function log(string $texto);
}

class ConsoleLogger implements ILogger {

    public function log(string $texto) {
        echo $texto . " Console " . PHP_EOL;
    }
}

class ArquivoLogger implements ILogger {

    public function log(string $texto) {
        echo $texto . " Arquivo " . PHP_EOL;
    }
}

class Aluno {
    public $matricula;
    public $nome;
    public $telefone;

    public function __construct(int $matricula, string $nome, string $telefone) {
        $this->matricula = $matricula;
        $this->nome      = $nome;
        $this->telefone  = $telefone;
    }
}

class Escola{
    public $alunos = array();
    // public $consoleLogger;
    // public $arquivoLogger;

    // public function __construct(ConsoleLogger $consoleLogger, ArquivoLogger $arquivoLogger) {
    //     $this->consoleLogger = $consoleLogger;
    //     $this->arquivoLogger = $arquivoLogger;
    // }

    public function logar() {
        $this->consoleLogger->log("Isso é um teste");
    }

    public function adicionarAluno(Aluno $aluno) {
        array_push($this->alunos, $aluno);
        // $this->consoleLogger->log("Aluno adicionado.");
    }

    public function removerAluno(Aluno $aluno){
        foreach ($this->alunos as $indice => $aluno_) {
            if ($aluno_->matricula == $aluno->matricula) {
                array_splice($this->alunos, $indice, 1);
                // $this->consoleLogger->log("Aluno removido.");
            }
        }
    }

    public function printAlunos() {
        echo "" . PHP_EOL;
        foreach ($this->alunos as $aluno) {
            echo "Matrícula: " . $aluno->matricula . PHP_EOL;
            echo "Nome: " . $aluno->nome . PHP_EOL;
            echo "Telefone: " . $aluno->telefone . PHP_EOL;
            echo "-------------------------" . PHP_EOL;
        }
    }

    public function getAlunos() {
        return $this->alunos;
    }
}


class EscolaLogTeste {
    public $escola;
    public $consoleLogger;
    public $arquivoLogger;

    public function __construct(Escola $escola, ConsoleLogger $consoleLogger, ArquivoLogger $arquivoLogger) {
        $this->escola        = $escola;
        // $this->aluno         = $aluno;
        $this->consoleLogger = $consoleLogger;
        $this->arquivoLogger = $arquivoLogger;
    }

    public function executar() {
        $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3 = new Aluno(3, "Beltrano", "7777-7777");
        // $escola->logar();

        $this->escola->adicionarAluno($aluno1);
        $this->consoleLogger->log("Aluno adicionado.");
        $this->escola->adicionarAluno($aluno2);
        $this->consoleLogger->log("Aluno adicionado.");
        $this->escola->adicionarAluno($aluno3);
        $this->consoleLogger->log("Aluno adicionado.");
        
        $this->escola->printAlunos();

        $this->escola->removerAluno($aluno2);
        $this->consoleLogger->log("Aluno removido.");

        $this->escola->printAlunos();
    }
}

class Main {

    public static function rodar() {

        $container = ContainerBuilder::buildDevContainer();

        $escola = $container->get(Escola::class);
        $escolaLog = $container->get(EscolaLogTeste::class);


        // $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        // $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        // $aluno3 = new Aluno(3, "Beltrano", "7777-7777");
        // // $escola->logar();

        // $escola->adicionarAluno($aluno1);
        // $escola->adicionarAluno($aluno2);
        // $escola->adicionarAluno($aluno3);
        
        // $escola->printAlunos();

        // $escola->removerAluno($aluno2);

        // $escola->printAlunos();

        $escolaLog->executar();
    }

}

Main::rodar();