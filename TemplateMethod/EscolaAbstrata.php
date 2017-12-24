<?php

namespace TemplateMethod;

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