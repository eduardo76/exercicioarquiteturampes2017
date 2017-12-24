<?php

namespace ChainOfResponsability;

class Professor implements Handler {
    private $handler = null;
    
    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 2) {
            echo "Professor resolve" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}