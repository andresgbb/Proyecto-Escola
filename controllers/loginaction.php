<?php
require 'persistence/conexion.php';
require 'persistence/config.php';
      
    //comprobar los campos proporcionados
        if(isset($_POST['email']) && isset($_POST['password'])){
            $dbManager = new DatabaseConnection($dbhost, $dbuser, $dbpass, $dbname);
            if ($dbManager->isConnected()) { //preguntamos si se ha conectado a a bd
                try{
                    //Obtenemos los valores que nos a proporcionado el usuario
                    $email=$_POST['email'];
                    filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL);  //FILTER_SANITIZE_EMAIL limpia lacadena para que solo sea un email
                    $password=$_POST['password'];
                    //Buscamos el usuario atraves del email que nos ha proporcionado 
                    $user=$dbManager->getUser($email);
                    //Preguntamos si ha obtenido el usuario
                    if($user){
                        //Si el usuario existe obtenemos sus campos
                        $userpass=$user[0]['password'];
                        $username=$user[0]['nombre'];
                        $userid=$user[0]['id'];
                        $userlastname=$user[0]['apellido'];
                        $rolUser=$user[0]['id_rol'];
                        /* Si existe la cookie email es que el usuario ya se ha logeado y puede ser que le haya dado.
                           Si el usuario le ha dado a recordar lo puede que envie la contraseña hasheada que tiene en la base de datos,
                           asi que la tendremos que comparar.
                           Una vez haya coincidido nos guardamos lainformacion necesaria y lo enviamos al login
                        */
                         if(isset($_COOKIE['email'])){
                            if($password == $userpass){
                                if(isset($_POST['recuerdame'])){
                                    setcookie('password', $userpass, time()+3600,'/');
                                }
                                setcookie('userid', $userid,time() + 3600, '/');
                                setcookie('user', $username,time() + 3600, '/');
                                setcookie('email', $email,time() + 3600,'/');
                                setcookie('lastname', $userlastname,time() + 3600, '/');
                                $_SESSION['rol']=$rolUser;
                                $_SESSION['name']=$username;
                                $_SESSION['id']= $userid;
                                $_SESSION['lastname']=$userlastname;
                                $_SESSION['email']=$email;
                                setcookie('idioma', 'en',time() + 3600, '/');
                                header('Location: ?url=dashboard');
                             }
                            // if($password == $userpass){
                                    //Obtendremos solo las variables de sesion ya que las cookies aun estaran creadas
                            //         $_SESSION['name']=$username;
                            //         $_SESSION['id']= $userid;
                            //         $_SESSION['lastname']=$userlastname;
                            //         $_SESSION['email']=$email;
                            //         $_SESSION['rol']=$rolUser;
                            //         header('Location: ?url=dashboard');
                            //  }
                         }                    
                         /*
                            Si el usuario  no nos ha mandado su contraseña hasheada tendremos que utilizar la funcion password_verify
                            para comprobar si coinciden. 
                            Si coinciden nos guardaremos los datos de usuarios necesarios y dejaremos entrar al usuario
                         */

                        if(password_verify($password , $userpass)){ //password_verify sirve para verificar un string y una contraseña hasheada
                            if(isset($_POST['recuerdame'])){
                                setcookie('password', $userpass, time()+3600,'/');
                            }
                            setcookie('userid', $userid,time() + 3600, '/');
                            setcookie('user', $username,time() + 3600, '/');
                            setcookie('email', $email,time() + 3600,'/');
                            setcookie('lastname', $userlastname,time() + 3600, '/');
                            $_SESSION['rol']=$rolUser;
                            $_SESSION['name']=$username;
                            $_SESSION['id']= $userid;
                            $_SESSION['lastname']=$userlastname;
                            $_SESSION['email']=$email;
                            setcookie('idioma', 'en',time() + 3600, '/');
                            header('Location: ?url=dashboard');

                            /* Todos los mensajes de error pueden suceder */

                        }else{
                            echo "LA CONTRASEÑA O EL EMAIL NO COINCIDEN";
                        }

                    }else{
                        echo "LA CONTRASEÑA O EL EMAIL NO COINCIDEN";
                    }
                   
                }catch(PDOException $ex){
                    echo "Error al encontrar el usuario: " . $ex->getMessage();
                }

            }else{

                echo "No se pudo conectar a la base de datos.";
            }  
         }else{
            header('Location: ?url=home');
         }
?>