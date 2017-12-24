<?php

namespace Proxy;

class Biblioteca implements IBiblioteca {
    private $livros = [];

    public function __construct() {
        //
    }

    public function consultarLivro(int $numero) {
        if ($numero <= count($this->livros)) {
            $livro = $this->livros[$numero];
            echo "Livro consultado: " . $numero . " - " . $livro->getTitulo() . PHP_EOL;
        } else {
            echo "Livro não encontrado." . PHP_EOL;
        }
    }

    public function retirarLivro(Livro $livro) {

        foreach ($this->livros as $indice => $_livro) {
            if ($livro->getTitulo() == $_livro->getTitulo()) {
                unset($this->livros[$indice]);
            }
        }

        echo "Livro retirado: " . $livro->getTitulo() . PHP_EOL;
    }

    public function devolverLivro(Livro $livro) {
        $this->livros[] = $livro;
        echo "Livro devolvido: " . $livro->getTitulo() . PHP_EOL;
    }
    
    public function toString() {
        foreach ($this->livros as $indice => $livro) {
            echo $indice . " - " . $livro->getAutorETitulo() . PHP_EOL;
        }
    }
}