<?php

namespace Singleton;

class Escola 
{
  private static $instance = null;
  public $alunos = array();

  private function __construct() {}

  public static function getInstance() {
    if (static::$instance === null){
      static::$instance = new Escola();
    }
    return static::$instance;
  }

  public function adicionarAluno(Aluno $aluno) {
    array_push($this->alunos, $aluno);
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
      $aluno->toString();
    }
  }

}