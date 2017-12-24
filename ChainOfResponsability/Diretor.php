<?php

namespace ChainOfResponsability;

class Diretor implements Handler {
    private $handler = null;
    
    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 4) {
            echo "Diretor resolve" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}