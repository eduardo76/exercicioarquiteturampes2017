<?php

namespace Proxy;

class AssitenteBiblioteca implements IBiblioteca {
    public $biblioteca = null;


    public function __construct() {
        $this->novaBiblioteca();
    }

    public function consultarLivro(int $numero) {
        if ($this->biblioteca == null) {
            $this->novaBiblioteca();
        }
        $this->biblioteca->consultarLivro($numero);
    }

    public function retirarLivro(Livro $livro) {
        if ($this->biblioteca == null) {
            $this->novaBiblioteca();
        }
        $this->biblioteca->retirarLivro($livro);
    }

    public function devolverLivro(Livro $livro) {
        if ($this->biblioteca == null) {
            $this->novaBiblioteca();
        }
        $this->biblioteca->devolverLivro($livro);
    }

    public function toString() {
        if ($this->biblioteca == null) {
            $this->novaBiblioteca();
        }
        $this->biblioteca->toString();
    }

    public function novaBiblioteca() {
        $this->biblioteca = new Biblioteca();
    }
}