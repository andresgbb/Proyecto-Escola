<?php

    require 'persistence/conexion.php';
    require 'persistence/config.php';
    
    //comprobar los campos proporcionados
        if( isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) &&  isset($_POST['password']) ){
            /* Destruimos las posibles sesiones ya que si se registra un nuevo usuario cuando ya esta logeado otro puede petar la aplicacion
            de esta manera prevenimos que eso suceda*/
            session_unset();
            session_destroy();
            $dbManager = new DatabaseConnection($dbhost, $dbuser, $dbpass, $dbname);
            if ($dbManager->isConnected()) {
                //Obtenemos toda la informacion que nos han proporcionado
                $name=$_POST['name'];
                $lastname=$_POST['lastname'];
                $email=$_POST['email'];
                //filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL);  //FILTER_SANITIZE_EMAIL limpia lacadena para que solo sea un email
                $password=$_POST['password'];       
                //Hasheamos la contraseña del usuario para que nadie pueda saber cual es
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                try {
                    //Añadimos el usuario a la base de datos
                    $dbManager->addUser($name, $lastname, $email, $hashedPassword);
                    echo "Usuario creado correctamente.";

                    //Si lo ha creado mandamos al usuario al login
                    header('Location: ?url=login');
                    /* Los posibles errores que pueden suceder y avisar al usuario*/
                } catch (PDOException $ex) {
                    echo "Error al crear el usuario: " . $ex->getMessage();
                }
                
            }else {
                echo "No se pudo conectar a la base de datos.";
            }            
         }else{
            header('Location: ?url=home');
         }

       
    

    //redireccionar a dashboard

    //si no vamos a home
?>