<?php

namespace DependencyInjection;

class ConsoleLogger implements ILogger {

    public function log(string $texto) {
        echo "Console: " . $texto . PHP_EOL;
    }
}