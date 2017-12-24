<?php

namespace Decorator;

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