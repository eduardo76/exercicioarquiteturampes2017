<?php

namespace Decorator;

class ListaInvertidaDecorator extends EscolaDecorator {

public function inverter() {
    $alunos = $this->getAlunos();
    return array_reverse($alunos);
}

}