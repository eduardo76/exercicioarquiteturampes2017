<?php
require "vendor/autoload.php";

use DependencyInjection\EscolaLogTeste;


// interface ILogger {
//     public function log(string $texto);
// }

// class Aluno {
//     public $matricula;
//     public $nome;
//     public $telefone;

//     public function __construct(int $matricula, string $nome, string $telefone) {
//         $this->matricula = $matricula;
//         $this->nome      = $nome;
//         $this->telefone  = $telefone;
//     }

//     public function toString() {
//         return "Aluno [matricula=" . $this->matricula . ", nome=" . $this->nome . ", telefone=" . $this->telefone . "]" . PHP_EOL;
//     }
// }

// class Escola {
//     public $alunos = array();
//     public $logger;

//     public function __construct(ILogger $logger) {
//         $this->logger = $logger;
//     }

//     public function adicionarAluno(Aluno $aluno) {
//         array_push($this->alunos, $aluno);
//         $this->logger->log("Aluno adicionado");
//     }

//     public function removerAluno(Aluno $aluno){
//         foreach ($this->alunos as $indice => $aluno_) {
//             if ($aluno_->matricula == $aluno->matricula) {
//                 array_splice($this->alunos, $indice, 1);
//             }
//         }
//         $this->logger->log("Aluno removido");
//     }

//     public function getAlunos() {
//         return $this->alunos;
//     }

//     public function printAlunos() {
//         echo "" . PHP_EOL;
//         foreach ($this->alunos as $aluno) {
//             echo $aluno->toString();
//         }
//     }
// }


// class ArquivoLogger implements ILogger {

//     public function log(string $texto) {
//         echo "Arquivo: " . $texto . PHP_EOL;
//     }
// }

// class ConsoleLogger implements ILogger {

//     public function log(string $texto) {
//         echo "Console: " . $texto . PHP_EOL;
//     }
// }

// class EscolaLogTeste {
//     public $escola;
//     public $consoleLogger;
//     public $arquivoLogger;

//     public static function executar() {

//         // Aqui está sendo usado o PHP-DI, dependency injection container, que controla a injeção de dependência
//         // Pode ser encontrado em: http://php-di.org/
//         $container = ContainerBuilder::buildDevContainer();
//         $container->set(ILogger::class, \DI\object(ConsoleLogger::class)); // Mapeia a interface para a classe concreta

//         $escola = $container->get(Escola::class);

//         $aluno1 = new Aluno(1, "Fulano", "8888-8888");
//         $aluno2 = new Aluno(2, "Cicrano", "9999-9999");
//         $aluno3 = new Aluno(3, "Beltrano", "7777-7777");

//         $escola->adicionarAluno($aluno1);
//         $escola->adicionarAluno($aluno2);
//         $escola->adicionarAluno($aluno3);
        
//         $escola->printAlunos();

//         $escola->removerAluno($aluno2);

//         $escola->printAlunos();
//     }
// }

class Main {

    public static function rodar() {
        EscolaLogTeste::executar();
        // $escola = new EscolaLogTeste();

        // $aluno1 = new Aluno(1, "Fulano", "8888-8888");
        // echo $aluno1->toString();;
    }

}

Main::rodar();