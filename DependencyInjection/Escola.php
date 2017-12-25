<?php

namespace DependencyInjection;

class Escola {
    public $alunos = array();
    public $logger;

    public function __construct(ILogger $logger) {
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