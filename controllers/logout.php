<?php


// Desloguear al usuario (borrar todas las sesiones)
session_unset(); // Elimina todas las variables de sesión
//Hacer que las cookies se expiren
setcookie('user', '', time() - 3600, '/');
setcookie('email', '', time() - 3600, '/');
setcookie('cookies_consent', '', time() - 3600);
setcookie('theme', '', time() - 3600, '/');
setcookie('idioma', '', time() - 3600, '/');
setcookie('password', '', time()-3600,'/');
setcookie('lastname', '',time() - 3600, '/');
setcookie('userid', '',time() - 3600, '/');

session_destroy(); // Destruye la sesión
// Mandar al usuario fuera de la aplicacio
header('Location: ?url=home');
?>
