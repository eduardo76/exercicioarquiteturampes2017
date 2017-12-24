<?php

namespace Iterator;

class EscolaIterator implements IIterator {
    
    private $alunos;
    private $indice = 0;

    public function __construct(array $alunos) {
        $this->alunos = $alunos;
    }

    public function first(): Aluno {
        $this->indice = 0;
        return $this->alunos[$this->indice];
    }

    public function next(): Aluno {
        $this->indice++;
        $aluno = $this->alunos[$this->indice];
        return $aluno;
    }

    public function isDone() {
        return $this->indice == (count($this->alunos) - 1);
    }

    public function current(): Aluno {
        return $this->alunos[$this->indice];
    }
}
