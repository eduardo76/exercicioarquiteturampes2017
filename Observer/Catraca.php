<?php

namespace Observer;

class Catraca implements IObserver {
    public function update(string $motivo) {
        echo "Catraca: " . $motivo . PHP_EOL;
    }
}