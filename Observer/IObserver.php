<?php

namespace Observer;

interface IObserver {
    public function update(string $motivo);
}