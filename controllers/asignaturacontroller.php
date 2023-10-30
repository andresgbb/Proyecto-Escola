<?php
 require 'persistence/conexion.php';
 require 'persistence/config.php';
    try{
        //Nos conectamos a la base de datos
        $dbManager = new DatabaseConnection($dbhost, $dbuser, $dbpass, $dbname);
        //Preguntamos si ha pulsado el boton
        if (isset($_POST["btn-matricular"])) {
            //Obtenemos el valor
            $matricula = $_POST["btn-matricular"];
           /*
           Preguntamos que asignatura a pulsado para matricularse. 
           Buscamos el alumno por su id y obtenemos el valor.
           Añadimos en la base de datos la matricula del alumno
           */
            if($matricula=="M01"){
                $alumno=$dbManager->getAlumno($_SESSION['id']);
                $alumnoid= $alumno[0]['id'];
                $dbManager->addMatricula( $_SESSION['M01id'],$alumnoid);
                
                header('Location: ?url=asignatura');
            }
            if($matricula=="M02"){
                $alumno=$dbManager->getAlumno($_SESSION['id']);
                $alumnoid= $alumno[0]['id'];
                $dbManager->addMatricula( $_SESSION['M02id'],$alumnoid);
                header('Location: ?url=asignatura');
            }
            if($matricula=="M03"){
                $alumno=$dbManager->getAlumno($_SESSION['id']);
                $alumnoid= $alumno[0]['id'];
                $dbManager->addMatricula( $_SESSION['M03id'],$alumnoid);
                header('Location: ?url=asignatura');
            }
            if($matricula=="M04"){
                $alumno=$dbManager->getAlumno($_SESSION['id']);
                $alumnoid= $alumno[0]['id'];
                $dbManager->addMatricula( $_SESSION['M04id'],$alumnoid);
                header('Location: ?url=asignatura');
            }
            
            
            
        }else{
            echo "Error";
        }
    }catch(Exception $e){
        throw new PDOException("Error con la conexion". $e->getMessage());
    }
?>