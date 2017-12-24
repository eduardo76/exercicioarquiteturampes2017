<?php

namespace Decorator;

interface IEscola {
    public function adicionarAluno(Aluno $aluno);
    public function removerAluno(Aluno $aluno);
    public function getAlunos();
}