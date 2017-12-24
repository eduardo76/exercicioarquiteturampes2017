<?php

namespace Iterator;

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
            $aluno->toString();
        }
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function createIterator(): iIterator {
        return new EscolaIterator($this->alunos);
    } 
}