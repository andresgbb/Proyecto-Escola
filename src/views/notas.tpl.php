<?php
 include_once 'partials/header.tpl.php';
    require 'controllers/asignaturadatos.php'
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="navegacion" href="?url=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active navegacion" aria-current="page">Notas</li>
  </ol>
</nav>
<body>
    <h1>NOTAS</h1>
    <?php
        /*
          Obtenemos las notas del alumno, y pregntamos si existen. Si no existen pondremos un mensaje como que todavia no tiene notas
          pero si las tiene nos recorremos el array de notas y obtendremos el nombre de la asignatura y la nota que ha obtenido y la printaremos en 
          un div
        */
       $notas=$dbManager->getNotas($alumnoid);
       if($notas){
        foreach($notas as $nota){
            $nota_asignatura=$nota['nota'];
            $asignaturaid=$nota['id_asignatura'];
            $nameAsignatura=$dbManager->getAsignatura($asignaturaid);
            $asignatura=$nameAsignatura[0]['nombre'];
            //echo "<br>".$asignatura;
            //echo "<br>".$nota_asignatura;
            echo '<div class="notas"><p class="nameasignatura"> '.$asignatura.'</p><p class="nota"> '.$nota_asignatura.'</p></div>';  
           }
       }else{
        echo '<h3 class="sin_notas">Todavia no tienes notas :( </h3>';
       }
    ?>
</body>