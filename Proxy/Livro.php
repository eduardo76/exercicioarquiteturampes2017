<?php

namespace Proxy;

class Livro {

    private $autor;
    private $titulo;

    public function __construct(string $titulo, string $autor) {
        $this->autor  = $autor;
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getAutorETitulo() {
      return $this->getTitulo() . " por " . $this->getAutor();
    }

}