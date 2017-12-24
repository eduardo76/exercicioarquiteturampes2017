<?php
require "../autoload.php";

use Singleton\Escola;
use Singleton\Aluno;

$aluno1 = new Aluno(1, "Fulano", "8888-8888");
$aluno2 = new Aluno(2, "Cicrano", "9999-9999");
$aluno3 = new Aluno(3, "Beltrano", "7777-7777");

$escola = Escola::getInstance();
Escola::getInstance()->adicionarAluno($aluno1);
Escola::getInstance()->adicionarAluno($aluno2);
Escola::getInstance()->adicionarAluno($aluno3);
Escola::getInstance()->printAlunos();

Escola::getInstance()->removerAluno($aluno2);

Escola::getInstance()->printAlunos();