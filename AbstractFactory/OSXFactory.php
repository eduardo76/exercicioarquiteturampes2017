<?php

namespace AbstractFactory;

class OSXFactory implements GUIFactory {

  public function createButton(): Button {
    return new OSXButton();
  }
  
}