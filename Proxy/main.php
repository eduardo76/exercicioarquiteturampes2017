<?php


interface IBiblioteca {
    public function consultarLivro($numero);
    public function retirarLivro(Livro $livro);
    public function devolverLivro(Livro $livro);
}

class AssitenteBiblioteca implements IBiblioteca {
    public $biblioteca = null;


    public function __construct() {
        $this->novaBiblioteca();
    }

    public function consultarLivro($numero) {
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

class Biblioteca implements IBiblioteca {
    private $livros = [];

    public function __construct() {
        //
    }

    public function consultarLivro($numero) {
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
        echo "===========================" . PHP_EOL;
        foreach ($this->livros as $indice => $livro) {
            echo $indice . " - Titulo: " . $livro->getTitulo() . " | Autor: " . $livro->getAutor() . PHP_EOL;
        }
        echo "===========================" . PHP_EOL;
    }
}

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


$livro1 = new Livro("Vue.js: Construa aplicações incríveis", "Caio Incau");
$livro2 = new Livro("Learning Vue.js 2", "Olga Filipova");
$livro3 = new Livro("The Majesty of Vue.js", "Kostas Maniatis; Alex Kyriakidis");
$livro4 = new Livro("Front-end com Vue.js", "Leonardo Vilarinho");

$assistenteBiblioteca = new AssitenteBiblioteca();
$assistenteBiblioteca->biblioteca->devolverLivro($livro1);
$assistenteBiblioteca->biblioteca->devolverLivro($livro2);
$assistenteBiblioteca->biblioteca->devolverLivro($livro3);

$assistenteBiblioteca->toString();

$assistenteBiblioteca->consultarLivro(1);

$assistenteBiblioteca->biblioteca->retirarLivro($livro2);

$assistenteBiblioteca->toString();

$assistenteBiblioteca->biblioteca->devolverLivro($livro4);

$assistenteBiblioteca->toString();