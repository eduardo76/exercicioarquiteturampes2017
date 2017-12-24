<?php

namespace ChainOfResponsability;

class Coordenador implements Handler {
    private $handler = null;
    
    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 3) {
            echo "Coordenador resolve" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}