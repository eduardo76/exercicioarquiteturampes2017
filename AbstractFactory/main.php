<?php
require "../autoload.php";

use AbstractFactory\Application;
use AbstractFactory\WinFactory;
use AbstractFactory\OSXFactory;


class Main {

    public static function run() {
        $factory1 = new WinFactory();
        $app1     = new Application($factory1);
        $app1->run();
        
        $factory2 = new OSXFactory();
        $app2     = new Application($factory2);
        $app2->run();
    }
}

Main::run();