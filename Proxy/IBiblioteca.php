<?php 

namespace Proxy;

interface IBiblioteca {
    public function consultarLivro(int $numero);
    public function retirarLivro(Livro $livro);
    public function devolverLivro(Livro $livro);
}