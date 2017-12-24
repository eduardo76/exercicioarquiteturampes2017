<?php 

namespace Iterator;

interface IIterator {
    public function first(): Aluno;
    public function next(): Aluno;
    public function isDone();
    public function current(): Aluno;
}