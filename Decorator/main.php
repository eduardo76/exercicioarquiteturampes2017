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

interface IEscola {
    public function adicionarAluno(Aluno $aluno);
    public function removerAluno(Aluno $aluno);
    public function getAlunos();
}

class Escola implements IEscola {
    public $alunos = array();

    public function adicionarAluno(Aluno $aluno) {
        array_push($this->alunos, $aluno);
    }

    public function removerAluno(Aluno $aluno){
        foreach ($this->alunos as $indice => $aluno_) {
            if ($aluno_->matricula == $aluno->matricula) {
            array_splice($this->alunos, $indice, 1);
            }
        }
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function printAlunos() {
        foreach ($this->alunos as $aluno) {
            echo $aluno->toString();
        }
    }
}

abstract class EscolaDecorator implements IEscola {

    private $escolaDecorada;

    public function __construct(IEscola $escolaDecorada) {
        $this->escolaDecorada = $escolaDecorada;
    }

    public function adicionarAluno(Aluno $aluno) {
        $this->escolaDecorada->adicionarAluno($aluno);
    }
    
    public function removerAluno(Aluno $aluno) {
        $this->escolaDecorada->removerAluno($aluno);
    }
    public function printAlunos() {
        $this->escolaDecorada->printAlunos($aluno);
    }

    public function getAlunos() {
        return $this->escolaDecorada->getAlunos();
    }
}

class EscolaComBusca extends EscolaDecorator {

    public function buscar(string $busca) {
        $alunos = $this->getAlunos();
        $alunosEncontrados = array();

        foreach ($alunos as $aluno) {
            if (strpos($aluno->nome, $busca, 0) === 0) {
                array_push($alunosEncontrados, $aluno);
            }
        }

        return $alunosEncontrados;
    }
}

class ListaInvertidaDecorator extends EscolaDecorator {

    public function inverter() {
        $alunos = $this->getAlunos();
        return array_reverse($alunos);
    }
    
}

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
