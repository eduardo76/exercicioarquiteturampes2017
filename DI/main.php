<?php

require "vendor/autoload.php";

use DI\ContainerBuilder;

interface ILogger {
    public function log(string $texto);
}

class ConsoleLogger implements ILogger {

    public function log(string $texto) {
        echo "Console: " . $texto . PHP_EOL;
    }
}

class ArquivoLogger implements ILogger {

    public function log(string $texto) {
        echo "Arquivo: " . $texto . PHP_EOL;
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

    public function toString() {
        return "Aluno [matricula=" . $this->matricula . ", nome=" . $this->nome . ", telefone=" . $this->telefone . "]" . PHP_EOL;
    }
}

class Escola{
    public $alunos = array();
    public $logger;

    public function __construct(ConsoleLogger $logger) {
        $this->logger = $logger;
    }

    public function adicionarAluno(Aluno $aluno) {
        array_push($this->alunos, $aluno);
        $this->logger->log("Aluno adicionado");
    }

    public function removerAluno(Aluno $aluno){
        foreach ($this->alunos as $indice => $aluno_) {
            if ($aluno_->matricula == $aluno->matricula) {
                array_splice($this->alunos, $indice, 1);
            }
        }
        $this->logger->log("Aluno removido");
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function printAlunos() {
        echo "" . PHP_EOL;
        foreach ($this->alunos as $aluno) {
            echo $aluno->toString();
        }
    }
}


class EscolaLogTeste {
    public $escola;
    public $consoleLogger;
    public $arquivoLogger;

    public static function executar() {
        $container = ContainerBuilder::buildDevContainer();

        $consoleLogger  = $container->get(ConsoleLogger::class);
        $escola         = $container->get(Escola::class);

        $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
        $aluno3 = new Aluno(3, "Beltrano", "7777-7777");
        // $escola->logar();

        $escola->adicionarAluno($aluno1);
        $escola->adicionarAluno($aluno2);
        $escola->adicionarAluno($aluno3);
        
        $escola->printAlunos();

        $escola->removerAluno($aluno2);

        $escola->printAlunos();
    }
}

class Main {

    public static function rodar() {
        EscolaLogTeste::executar();
    }

}

Main::rodar();