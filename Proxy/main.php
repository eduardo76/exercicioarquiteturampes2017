<?php
require_once "../autoload.php";

use Proxy\AssitenteBiblioteca;
use Proxy\Livro;

class Main {
    
    public static function run() {
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
    }
}

Main::run();