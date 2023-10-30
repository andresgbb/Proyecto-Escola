<?php
session_start();

if(!isset($_COOKIE['theme'])){
    setcookie('theme', 'light',time() + 365 * 24 * 60 * 60, '/');
}
if(!isset($_COOKIE['idioma'])){
    setcookie('idioma', 'en',time() + 365 * 24 * 60 * 60, '/');
}

require 'src/router.php';
require 'src/routes.php';

try{
    $controller= getRoute($routes);
    if($controller===null){
        $controller="home";
    }
    require 'controllers/' .$controller.'.php';
}catch(Exception $e){
    $_SESSION['error']=$e->getMessage();
    require 'public/error.php';
}




?>