<?php

namespace Observer;

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