<?php

namespace Decorator;

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