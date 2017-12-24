<?php

interface Graphic {
    public function draw();
}

class Line implements Graphic {
    public function draw(){
        echo "Desenhando uma Linha." . PHP_EOL;
    }
}

class Rectangle implements Graphic {
    public function draw(){
        echo "Desenhando um Retangulo." . PHP_EOL;
    }
}

class Text implements Graphic {
    public function draw(){
        echo "Desenhando um Text." . PHP_EOL;
    }
}

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

$line      = new Line();
$rectangle = new Rectangle();
$text      = new Text();

$picture = new Picture();
$picture->add($line);
$picture->add($rectangle);
$picture->add($text);
$picture->draw();

$picture->remove($rectangle);
$picture->draw();

$picture->getChild(1)->draw();