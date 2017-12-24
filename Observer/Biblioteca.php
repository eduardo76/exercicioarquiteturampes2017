<?php

namespace Observer;

class Biblioteca implements IObserver {
    public function update(string $motivo) {
        echo "Biblioteca: " .$motivo . PHP_EOL;
    }
}

