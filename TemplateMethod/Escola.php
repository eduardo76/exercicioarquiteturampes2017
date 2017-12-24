<?php 

namespace TemplateMethod;

class Escola extends EscolaAbstrata {
    public function antesAdicionarAluno() {
        echo "Antes adicionar aluno" . PHP_EOL ;
    }

    public function aposAdicionarAluno() {
        echo "Após adicionar aluno" . PHP_EOL;
    }
}