<?php 


interface Handler {
    public function nextHandler(Handler $handler);
    public function occorencia(int $nivel);
}

class Monitor implements Handler {

    private $handler = null;

    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 1) {
            echo "Monitor" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}

class Professor implements Handler {
    private $handler = null;
    
    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 2) {
            echo "Professor" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}

class Coordenador implements Handler {
    private $handler = null;
    
    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 3) {
            echo "Coordenador" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}

class Diretor implements Handler {
    private $handler = null;
    
    public function nextHandler(Handler $handler) {
        $this->handler = $handler;
    }

    public function occorencia(int $nivel) {
        if ($nivel <= 4) {
            echo "Diretor" . PHP_EOL;
        } else {
            $this->handler->occorencia($nivel);
        }
    }
}

$monitor     = new Monitor();
$professor   = new Professor();
$coordenador = new Coordenador();
$diretor     = new Diretor();

$monitor->nextHandler($professor);
$professor->nextHandler($coordenador);
$coordenador->nextHandler($diretor);

$monitor->occorencia(3);