<?php
require 'src/routes.php';
    function getRoute($routes){
        //global $routes; //Global sirve para decir que la variable se pueda llamar des de otro archivo
        if(isset($_REQUEST['url'])){
            $url=$_REQUEST['url'];//Recoge el valor de la petición
            if(in_array($url,$routes)){ //Aqui estamos preguntando si en el array existe esto
                return $url;
            }else{
                throw new Exception("Route not found");
            }
        }
        return null;   
    }


?>