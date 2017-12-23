<?php

namespace AbstractFactory;

class OSXFactory extends GUIFactory {

  public function createButton(): Button {
    return new OSXButton();
  }
  
}