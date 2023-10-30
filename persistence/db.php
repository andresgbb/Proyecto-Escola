<?php

require 'persistence/conexion.php';
require 'persistence/config.php';

$dbhost = "127.0.0.1";
$dbname = "escola";
$dbuser = "root";
$dbpass = "";

try {
    $dbManager = new DatabaseConnection($dbhost, $dbuser, $dbpass, $dbname);
    if ($dbManager->isConnected()) {
        echo "Conexión exitosa a la base de datos.<br>";

        // Datos del usuario
        $name = "John";
        $lastname = "Doe";
        $email = "an@example.com";
        $password = "mysecretpassword";

        try {
            $dbManager->addUser($name, $lastname, $email, $password);
            echo "Usuario creado correctamente.";
        } catch (PDOException $ex) {
            echo "Error al crear el usuario: " . $ex->getMessage();
        }
    } else {
        echo "No se pudo conectar a la base de datos.";
    }
} catch (PDOException $ex) {
    echo "Error al conectar a la base de datos: " . $ex->getMessage();
}

?>




