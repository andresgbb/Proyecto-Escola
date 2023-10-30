<?php
    // Verificar si el botón "aceptar" se ha presionado
    if (isset($_POST['aceptar']) == 'aceptar') {
        //si las ha acetado crearemos una cookie como que si las a aceptado
        setcookie('cookies_consent', 'yes', time() + 365 * 24 * 3600); // Caduca en 1 año
        header('Location: ?url=home');
        /*SI le ha dado solo a las necesarias no habra aceptado pero abra aceptado las cookies necesarias para navegar  */
    } elseif (isset($_POST['cancelar']) == 'cancelar') {
        setcookie('cookies_consent', 'no', time() + 365 * 24 * 3600);
        
        header('Location: ?url=home');
    }
