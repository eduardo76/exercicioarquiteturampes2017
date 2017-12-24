<?php

namespace ChainOfResponsability;

interface Handler {
    public function nextHandler(Handler $handler);
    public function occorencia(int $nivel);
}