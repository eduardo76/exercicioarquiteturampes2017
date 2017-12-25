<?php

namespace DependencyInjection;

class ArquivoLogger implements ILogger {

    public function log(string $texto) {
        echo "Arquivo: " . $texto . PHP_EOL;
    }
}