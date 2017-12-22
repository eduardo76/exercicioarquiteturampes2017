<?php

namespace AbstractFactory;

class Application {

  private $button;

  public function __construct(GUIFactory $factory) {
    $this->button = $factory->createButton();
  }

  public function run() {
    $this->button->paint();
  }

}
