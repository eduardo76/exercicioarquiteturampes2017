<?php

namespace DI;

class ConsoleLogger implements ILogger {

    public function log(string $texto) {
        echo "Console: " . $texto . PHP_EOL;
    }
}