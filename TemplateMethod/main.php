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
        return "Aluno [matricula=" . $this->matricula . ", nome=" . $this->nome . ", telefone=" . $this->telefone . "]" . PHP_EOL;
    }
}

abstract class EscolaAbstrata {
    public $alunos = array();

    public function adicionarAluno(Aluno $aluno) {
        $this->antesAdicionarAluno();
        array_push($this->alunos, $aluno);
        $this->aposAdicionarAluno();
    }

    public function removerAluno(Aluno $aluno){
        foreach ($this->alunos as $indice => $aluno_) {
            if ($aluno_->matricula == $aluno->matricula) {
                array_splice($this->alunos, $indice, 1);
            }
        }
    }

    public function printAlunos() {
        echo "" . PHP_EOL;
        foreach ($this->alunos as $aluno) {
            echo $aluno->toString();
        }
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public abstract function antesAdicionarAluno();
    public abstract function aposAdicionarAluno();
}

class Escola extends EscolaAbstrata {
    public function antesAdicionarAluno() {
        echo "Antes adicionar aluno" . PHP_EOL ;
    }

    public function aposAdicionarAluno() {
        echo "Após adicionar aluno" . PHP_EOL;
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

