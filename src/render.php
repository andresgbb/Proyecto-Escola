<?php
    //template es la plantilla 
    function render(string $template, array $data=[]):string{
        if($data){
            //La clave del array sera el nombre de la variable
            extract($data, EXTR_OVERWRITE); // coge el array asociativo y lo devuelve en una variable que dentro tendra el valor
        }
        //inicializar buffer de salida //buffer es un espacio en memoria0
        ob_start(); //Activa el almacenamiento en búfer de la salida
        require 'src/views/' .$template. '.tpl.php';
        $rendered=ob_get_clean(); //Obtiene el buffer y lo vuelca a string
        return (string)$rendered;
    }

?>