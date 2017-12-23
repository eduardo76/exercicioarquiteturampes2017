<?php

namespace AbstractFactory;

class WinFactory extends GUIFactory {

  public function createButton(): Button {
    return new WinButton();
  }

}