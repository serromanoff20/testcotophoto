<?php namespace my;
spl_autoload_register(function (string $className) {
    require_once __DIR__.'/' . $className . '.php';
});

use controllers\MainController;

$controller = new MainController();

if(empty($_GET['name'])){
    switch ($_SERVER['REQUEST_URI']){
        case '/main/get':
            $controller->get();
            break;
        case '/main/post':
            if (isset($_POST['key'])){
                $controller->post($_POST['key']);
            }else{
                $controller->sayBuy();
            }
            break;
        default:
            $controller->main();
    }
} else {
    $controller->sayHello($_GET['name']);
}
