<?php

namespace Composite;

class Line implements Graphic {
    public function draw(){
        echo "Desenhando uma Linha." . PHP_EOL;
    }
}
