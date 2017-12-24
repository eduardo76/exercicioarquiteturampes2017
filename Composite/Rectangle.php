<?php

namespace Composite;

class Rectangle implements Graphic {
    public function draw(){
        echo "Desenhando um Retangulo." . PHP_EOL;
    }
}