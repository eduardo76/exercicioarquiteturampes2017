<?php

namespace Composite;

class Picture implements Graphic {
    private $graphics = array();

    public function draw(){
        foreach ($this->graphics as $graphic) {
            $graphic->draw();
        }
        echo "==========================" . PHP_EOL;
    }

    public function add(Graphic $graphic) {
        array_push($this->graphics, $graphic);
    }

    public function remove(Graphic $graphic) {
        foreach ($this->graphics as $indice => $g) {
            if ($g === $graphic) {
                array_splice($this->graphics, $indice, 1);
            }
        }
    }

    public function getChild(int $index): Graphic {
        return $this->graphics[$index];
    }
}
