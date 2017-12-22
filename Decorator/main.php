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
}

interface IEscola {
    public function adicionarAluno(Aluno $aluno);
    public function removerAluno(Aluno $aluno);
    public function printAlunos();
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

        foreach ($alunos as $aluno) {
            if ($aluno->nome == $busca) {
                return $aluno;
            }
        }
    }
}

$aluno1 = new Aluno(1, "Fulano", "8888-8888");
$aluno2 = new Aluno(2, "Cicrano", "9999-9999");
$aluno3 = new Aluno(3, "Beltrano", "7777-7777");

$escola = new Escola();

$escola->adicionarAluno($aluno1);
$escola->adicionarAluno($aluno2);
$escola->adicionarAluno($aluno3);

$escolaDecorator = new EscolaComBusca($escola);

$aluno = $escolaDecorator->buscar("Beltrano");

echo "-------------------------" . PHP_EOL;
echo "Matrícula: " . $aluno->matricula . PHP_EOL;
echo "Nome: " . $aluno->nome . PHP_EOL;
echo "Telefone: " . $aluno->telefone . PHP_EOL;
