<?php

include('autoload.php');

class Test {
    public $test = 'default_test';
}

// go to mini.php/test/
$app = new Kriss\Core\App\App(new Kriss\Core\Container\DiceContainer(new Dice\Dice));
include('plugins/routerAuto.php');
$app->run();

