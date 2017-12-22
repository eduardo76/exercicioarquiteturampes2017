<?php

interface Aggregate {
    public function createIterator(): iIterator;
}

interface iIterator {
    public function first(): Aluno;
    public function next(): Aluno;
    public function isDone();
    public function current(): Aluno;
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
        echo "Matrícula: " . $this->matricula . PHP_EOL;
        echo "Nome: " . $this->nome . PHP_EOL;
        echo "Telefone: " . $this->telefone . PHP_EOL;
        echo "-------------------------" . PHP_EOL;
    }
}

class Escola implements Aggregate {
    public $alunos = array();

    public function adicionarAluno(Aluno $aluno) {
        array_push($this->alunos, $aluno);
    }

    public function removerAluno(Aluno $aluno, string $motivo){
        foreach ($this->alunos as $indice => $aluno_) {
            if ($aluno_->matricula == $aluno->matricula) {
                array_splice($this->alunos, $indice, 1);
                $this->notify($motivo);
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

    public function createIterator(): iIterator {
        return new EscolaIterator($this->alunos);
    } 
}

class EscolaIterator implements iIterator {
    
    private $alunos;
    private $indice = 0;

    public function __construct(array $alunos) {
        $this->alunos = $alunos;
    }

    public function first(): Aluno {
        $this->indice = 0;
        return $this->alunos[$this->indice];
    }

    public function next(): Aluno {
        $this->indice++;
        $aluno = $this->alunos[$this->indice];
        return $aluno;
    }

    public function isDone() {
        return $this->indice == (count($this->alunos) - 1);
    }

    public function current(): Aluno {
        return $this->alunos[$this->indice];
    }
}

$aluno1 = new Aluno(1, "Fulano", "8888-8888");
$aluno2 = new Aluno(2, "Cicrano", "9999-9999");
$aluno3 = new Aluno(3, "Beltrano", "7777-7777");

$escola = new Escola();

$escola->adicionarAluno($aluno1);
$escola->adicionarAluno($aluno2);
$escola->adicionarAluno($aluno3);

$escolaIterator = $escola->createIterator();

$aluno = $escolaIterator->first();
$aluno->toString();

$aluno = $escolaIterator->next();
$aluno->toString();

$aluno = $escolaIterator->current();
$aluno->toString();

$aluno = $escolaIterator->next();
$aluno->toString();

$aluno = $escolaIterator->first();
$aluno->toString();

while (!$escolaIterator->isDone()) {
    $aluno = $escolaIterator->next();
    $aluno->toString();
}
