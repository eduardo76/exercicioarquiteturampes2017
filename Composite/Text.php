<?php

namespace Composite;

class Text implements Graphic {
    public function draw(){
        echo "Desenhando um Text." . PHP_EOL;
    }
}