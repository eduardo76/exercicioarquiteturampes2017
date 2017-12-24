<?php

namespace Decorator;

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