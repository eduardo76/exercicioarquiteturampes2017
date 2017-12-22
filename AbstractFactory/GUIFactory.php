<?php
namespace AbstractFactory;

interface GUIFactory {
  public function createButton(): Button;
}
