<?php

namespace AbstractFactory;

class WinButton implements Button{

  public function paint() {
    echo "WinButton created". PHP_EOL;
  }

}
