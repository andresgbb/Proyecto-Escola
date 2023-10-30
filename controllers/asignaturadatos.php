<?php
require 'persistence/conexion.php';
require 'persistence/config.php';
try{
    $dbManager = new DatabaseConnection($dbhost, $dbuser, $dbpass, $dbname);
    /*
    Obtenemos los datos necesarios de todas las asignaturas para luego presentar los datos o los
    utilizaremos mas adelante.

    NO ME DIO TIEMPO A CAMBIAR EL CODIGO, UNA BUENA PRACTICA SERIA OBTENERLO TODOS LOS DATOS EN UN ARRAY Y 
    RECORRER EL ARRAY PARA RECOGER LOS DATOS 
    */
    $M01=$dbManager->getAsignatura(1); 
    $M01name=$M01[0]['nombre'];
    $M01id=$M01[0]['id'];
    $M01profesor=$M01[0]['id_profesor'];
    $_SESSION['M01id'] = $M01id;
    $M02=$dbManager->getAsignatura(2);
    $M02name=$M02[0]['nombre'];
    $M02id=$M02[0]['id'];
    $M02profesor=$M02[0]['id_profesor'];
    $_SESSION['M02id'] = $M02id;
    $M03=$dbManager->getAsignatura(3);
    $M03name=$M03[0]['nombre'];
    $M03id=$M03[0]['id'];
    $M03profesor=$M03[0]['id_profesor'];
    $_SESSION['M03id'] = $M03id;
    $M04=$dbManager->getAsignatura(4);
    $M04name=$M04[0]['nombre'];
    $M04id=$M04[0]['id'];
    $M04profesor=$M04[0]['id_profesor'];
    $_SESSION['M04id'] = $M04id;
    //Obtener los la id del alumno que se ha conectado
   $alumno=$dbManager->getAlumno($_SESSION['id']);
   $alumnoid= $alumno[0]['id'];
    /* Obtener los datos de los profesores para presentarlos mas adelante
        
    EN ESTE CASO PASA LO MISMO CON EL CASO ANTERIOR SE DEBERIA DE GUARDAR TODO EN UN ARRAY
    PARA LUEGO RECOGERLO Y GUARDAR LOS DATOS
    */
   $profesor=$dbManager->getProfesorIdUser($M01profesor);
   $profesorid=$profesor[0]['id'];
   $profesor=$dbManager->getProfesorName($profesorid);
   $profesornameM01=$profesor[0]['nombre'];
   $profesorlastnameM01=$profesor[0]['apellido'];

   $profesor=$dbManager->getProfesorIdUser($M02profesor);
   $profesorid=$profesor[0]['id'];
   $profesor=$dbManager->getProfesorName($profesorid);
   $profesornameM02=$profesor[0]['nombre'];
   $profesorlastnameM02=$profesor[0]['apellido'];

   $profesor=$dbManager->getProfesorIdUser($M03profesor);
   $profesorid=$profesor[0]['id'];
   $profesor=$dbManager->getProfesorName($profesorid);
   $profesornameM03=$profesor[0]['nombre'];
   $profesorlastnameM03=$profesor[0]['apellido'];

   $profesor=$dbManager->getProfesorIdUser($M04profesor);
   $profesorid=$profesor[0]['id'];
   $profesor=$dbManager->getProfesorName($profesorid);
   $profesornameM04=$profesor[0]['nombre'];
   $profesorlastnameM04=$profesor[0]['apellido'];
}catch(Exception $e){
    echo "Error con la base de datos : " . $e->getMessage();
}

?>