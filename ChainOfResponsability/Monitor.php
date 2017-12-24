<?php

namespace ChainOfResponsability;

class Monitor implements Handler {

private $handler = null;

public function nextHandler(Handler $handler) {
    $this->handler = $handler;
}

public function occorencia(int $nivel) {
    if ($nivel <= 1) {
        echo "Monitor resolve" . PHP_EOL;
    } else {
        $this->handler->occorencia($nivel);
    }
}
}