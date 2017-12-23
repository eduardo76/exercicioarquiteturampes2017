<?php
namespace AbstractFactory;

abstract class GUIFactory {
  public abstract function createButton(): Button;
}
