<?php
    include_once 'partials/header.tpl.php';
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="navegacion" href="?url=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active navegacion" aria-current="page">Settings</li>
  </ol>
</nav>
<body>
    <?php
        //Preguntaremos el idioma para poner un mensaje en ingles o en español
         if($_COOKIE['idioma'] == 'es'){
           echo '<h1>Seleccione un idioma:</h1>';
        }if($_COOKIE['idioma'] == 'en'){
            echo '<h1>Choose the idiom:</h1>';
        }
    ?>
    
    <form action="?url=settingsaction" class="form-setting" method="post">
        <label for="idioma">Idioma:</label>
        <select id="idioma" name="idioma">
            <option value="es">Spanish</option>
            <option value="en">English</option>
        </select>
        <label for="theme">Tema:</label>
        <select name="theme" id="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select>
        <br><br>
        <input type="submit" class="btn-setting" value="Enviar">
    </form>    
</body>
</html>
