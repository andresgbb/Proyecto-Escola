<body>
<h3 class="dash-title"><?= $title; ?></h3>
</body>
</html>
<?php
    include_once 'partials/header.tpl.php';
    //Preguntamos en que idioma esta, si es en español podremos un mensaje en español y si no en ingles
    if($_COOKIE['idioma'] == 'es'){
        echo "<h2 class='welcome'>BIENVENIDO </h2>";
    }if($_COOKIE['idioma'] == 'en'){
       echo "<h2 class='welcome'>WELCOME </h2>";
    }
    //Ponemos el nombre y el apellido del alumno
    echo "<br><br><br>";
    echo "<br><p class='dashboard-user'>".$_COOKIE['user'] ."</p>"; 
    print "<p class='dashboard-user'>". $_COOKIE['lastname'] ."</p><br><br>";
?>
<body>
    <div class="links">
        <?php
        //Si el usuario no es un alumno y es un profesore no podra ver la pagina de notas ya que es informacion solo para el alumno y tampoco la de matriculas

        //Un profesor no vera la pagina de asignaturas ya que es para qye los alumnos se matriculen
        if($_SESSION['rol']==1){
            echo '<a href="?url=asignatura">ASIGNATURAS</a>';
            echo '<a href="?url=notas">NOTAS</a>';
        }
        ?>
        <a href="?url=logout">LOGOUT</a>
        <a href="?url=settings">SETTINGS</a>
        <a href="?url=profile">PROFILE</a>
        

    </div>
    
</body>
