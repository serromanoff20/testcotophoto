<?php namespace controllers;

require_once 'models/Test.php';

use my\models\Test;

class MainController
{
    public function main()
    {
        echo 'Главная страница';
    }

    public function sayHello(string $str)
    {
        echo '<h1>Привет, '.$str.'</h1>';
    }

    public function get()
    {
        echo (new Test())->getFunction();
    }

    public function post(string $key)
    {
        echo (new Test())->postFunction($key);
    }

    public function sayBuy()
    {
        echo (new Test())->error();
    }

}
