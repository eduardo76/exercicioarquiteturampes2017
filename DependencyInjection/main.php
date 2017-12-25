<?php
require "vendor/autoload.php";

use DependencyInjection\EscolaLogTeste;

class Main {

    public static function rodar() {
        EscolaLogTeste::executar();
    }

}

Main::rodar();