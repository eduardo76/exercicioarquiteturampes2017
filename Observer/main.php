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

interface ISubject {
    public function attach(IObserver $observer);
    public function detach(IObserver $observer);
    public function notify(string $motivo);
}

class Escola implements ISubject {
    public $alunos    = array();
    public $observers = array();

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

    public function attach(IObserver $observer) {
        array_push($this->observers, $observer);
    }

    public function detach(IObserver $observer) {
        foreach ($this->observers as $indice => $observer_) {
            if ($observer_ === $observer) {
                array_splice($this->observers, $indice, 1);
            }
        }
    }

    public function notify(string $motivo) {
        foreach ($this->observers as $observer) {
            $observer->update($motivo);
        }
    }
}

interface IObserver {
    public function update(string $motivo);
}

class Biblioteca implements IObserver {
    public function update(string $motivo) {
        echo "Biblioteca: " .$motivo . PHP_EOL;
    }
}

class Catraca implements IObserver {
    public function update(string $motivo) {
        echo "Catraca: " . $motivo . PHP_EOL;
    }
}


$aluno1     = new Aluno(1, "Fulano", "8888-8888");
$aluno2     = new Aluno(2, "Cicrano", "9999-9999");
$aluno3     = new Aluno(3, "Beltrano", "7777-7777");

$escola     = new Escola();
$biblioteca = new Biblioteca();
$catraca    = new Catraca();

$escola->attach($biblioteca);
$escola->attach($biblioteca);
$escola->attach($catraca);

$escola->adicionarAluno($aluno1);
$escola->adicionarAluno($aluno2);
$escola->adicionarAluno($aluno3);

$escola->removerAluno($aluno2, "Remova Aluno");

