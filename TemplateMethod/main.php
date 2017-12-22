<?php

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

abstract class EscolaAbstrata {

    public function adicionarAluno(Aluno $aluno) {
        $this->antes();
        array_push($this->alunos, $aluno);
        $this->depois();
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

    public abstract function antes();
    public abstract function depois();
}

class Escola extends EscolaAbstrata {
    public $alunos = array();

    public function antes() {
        echo "Method antes()"  . PHP_EOL ;
    }

    public function depois() {
        echo "Method depois()"  . PHP_EOL;
    }
}

$aluno1 = new Aluno(1, "Fulano", "8888-8888");
$aluno2 = new Aluno(2, "Cicrano", "9999-9999");
$aluno3 = new Aluno(3, "Beltrano", "7777-7777");

$escola = new Escola();

$escola->adicionarAluno($aluno1);
$escola->adicionarAluno($aluno2);
$escola->adicionarAluno($aluno3);

$escola->printAlunos();
