<?php

namespace AbstractFactory;

class WinFactory implements GUIFactory {

  public function createButton(): Button {
    return new WinButton();
  }

}