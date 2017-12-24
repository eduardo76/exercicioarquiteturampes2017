<?php

use Composite\Line;
use Composite\Text;
use Composite\Picture;
use Composite\Rectangle;
require_once "../autoload.php";

class Main {

    public static function run() {
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
    }
}

Main::run();