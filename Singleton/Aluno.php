<?php

namespace Singleton;

class Aluno 
{
  public $matricula;
  public $nome;
  public $telefone;

  public function __construct(int $matricula, string $nome, string $telefone) {
    $this->matricula = $matricula;
    $this->nome      = $nome;
    $this->telefone  = $telefone;
  }
}