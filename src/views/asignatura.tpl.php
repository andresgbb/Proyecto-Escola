<?php
include_once 'controllers/asignaturadatos.php';
include_once 'partials/header.tpl.php';
//require 'persistence/conexion.php';
require 'persistence/config.php';
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="navegacion" href="?url=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active navegacion" aria-current="page">Asignaturas</li>
  </ol>
</nav>
<body>
    <div class="box-asignaturas">
        <div class="asignatura">
            <h3 class="asignatura-title"><?= $M01name;?></h3>  <!--  Printamos el nombre de la asignatura  -->
            <p class="description">Módulo donde se introduce al alumno en la Gestión del amplio abanico de Entornos de Desarrollo que encontramos en el mundo de l
                a programación. Aprenderemos a trabajar con ellos, configurándolos y realizando las instalaciones adecuadas para mejorar el tratamiento 
                de los errores y obtener un código depurado, veremos cómo se realiza la documentación de la prueba y optimización del código y trabajaremos 
                con las herramientas que nos permiten representar de forma gráfica (diagramas) las clases y su comportamiento</p>
                <!--  Printamos el nombre del profesor y su apellido  -->
            <p class="profesor">Profesor: <?php print $profesornameM01. " ". $profesorlastnameM01?></p>
            <p class="horas">160h</p>
            <form action="?url=asignaturacontroller" method="post">
                <div class="content-btn">   
                    <?php
                    // RECORRERME EL ARRAY ASOCIATIVO DE MATRICULA
                    /*
                        Obtenemos toddas las matriculas del alumno y nos recorremos el array, preguntamos si la id de la asignatura registrada es igual a la id de la 
                        asignatura. Si coincide es que el usaurio ya se ha registrado y pondremos un parrafo donde diga que ya se ha matriculado,
                        si no coincide con ningun registro es que no se ha matriculado en esa asignatura asi que pondremos un boton para que pueda hacerlo
                    */
                      $matriculas= $dbManager->getMatricula($alumnoid);
                      $encontrado = false;
                       foreach($matriculas as $matricula){
                            $matriculaid=$matricula['id_asignatura'];
                            if($matriculaid==$M01id){
                                $encontrado=True;
                                break;
                            }
                        }
                        if($encontrado==True){
                            echo "<p>Ya te has matriculado</p>";
                        }if($encontrado==false){
                            echo '<button class="btn-matricular" name="btn-matricular" value="M01" type="submit">Matricularme</button>';
                        }
                    ?>   
                </div>
            </form>
        </div>
        <div class="asignatura">
            <h3 class="asignatura-title"><?= $M02name;?></h3>
            <p class="description">Módulo donde se introduce al alumno en la Gestión del amplio abanico de Entornos de Desarrollo que encontramos en el mundo de l
                a programación. Aprenderemos a trabajar con ellos, configurándolos y realizando las instalaciones adecuadas para mejorar el tratamiento 
                de los errores y obtener un código depurado, veremos cómo se realiza la documentación de la prueba y optimización del código y trabajaremos 
                con las herramientas que nos permiten representar de forma gráfica (diagramas) las clases y su comportamiento</p>
            <p class="profesor">Profesor: <?php print $profesornameM02. " ". $profesorlastnameM02?></p>
            <p class="horas">180h</p>
            <form action="?url=asignaturacontroller" method="post">
                <div class="content-btn"> 
                <?php
                    // RECORRERME EL ARRAY ASOCIATIVO DE MATRICULA
                    /*
                         Obtenemos toddas las matriculas del alumno y nos recorremos el array, preguntamos si la id de la asignatura registrada es igual a la id de la 
                        asignatura. Si coincide es que el usaurio ya se ha registrado y pondremos un parrafo donde diga que ya se ha matriculado,
                        si no coincide con ningun registro es que no se ha matriculado en esa asignatura asi que pondremos un boton para que pueda hacerlo
                       */
                      
                      $matriculas= $dbManager->getMatricula($alumnoid);
                      $encontrado = false;
                       foreach($matriculas as $matricula){
                            $matriculaid=$matricula['id_asignatura'];
                            if($matriculaid==$M02id){
                                $encontrado=True;
                                break;
                            }
                        }
                        if($encontrado==True){
                            echo "<p>Ya te has matriculado</p>";
                        }if($encontrado==false){
                            echo '<button class="btn-matricular" name="btn-matricular" value="M02" type="submit">Matricularme</button>';
                        }
                    ?>  
                    
                </div>
            </form>
        </div>
    </div>
    <div class="box-asignaturas">
        <div class="asignatura">
            <h3 class="asignatura-title"><?= $M03name;?></h3>
            <p class="description">Módulo donde se introduce al alumno en la Gestión del amplio abanico de Entornos de Desarrollo que encontramos en el mundo de l
                a programación. Aprenderemos a trabajar con ellos, configurándolos y realizando las instalaciones adecuadas para mejorar el tratamiento 
                de los errores y obtener un código depurado, veremos cómo se realiza la documentación de la prueba y optimización del código y trabajaremos 
                con las herramientas que nos permiten representar de forma gráfica (diagramas) las clases y su comportamiento</p>
                <p class="profesor">Profesor: <?php print $profesornameM03. " ". $profesorlastnameM03?></p>
            <p class="horas">220h</p>
            <form action="?url=asignaturacontroller" method="post">
                <div class="content-btn">   
                <?php
                    // RECORRERME EL ARRAY ASOCIATIVO DE MATRICULA
                    /* 
                         Obtenemos toddas las matriculas del alumno y nos recorremos el array, preguntamos si la id de la asignatura registrada es igual a la id de la 
                        asignatura. Si coincide es que el usaurio ya se ha registrado y pondremos un parrafo donde diga que ya se ha matriculado,
                        si no coincide con ningun registro es que no se ha matriculado en esa asignatura asi que pondremos un boton para que pueda hacerlo
                    */
                      $matriculas= $dbManager->getMatricula($alumnoid);
                      $encontrado = false;
                       foreach($matriculas as $matricula){
                            $matriculaid=$matricula['id_asignatura'];
                            if($matriculaid==$M03id){
                                $encontrado=True;
                                break;
                            }
                        }
                        if( $encontrado==True){
                            echo "<p>Ya te has matriculado</p>";
                        }if($encontrado==false){
                            echo '<button class="btn-matricular" name="btn-matricular" value="M03" type="submit">Matricularme</button>';
                        }
                    ?>
                </div>
            </form>
        </div>
        <div class="asignatura">
            <h3 class="asignatura-title"><?= $M04name;?></h3>
            <p class="description">Módulo donde se introduce al alumno en la Gestión del amplio abanico de Entornos de Desarrollo que encontramos en el mundo de l
                a programación. Aprenderemos a trabajar con ellos, configurándolos y realizando las instalaciones adecuadas para mejorar el tratamiento 
                de los errores y obtener un código depurado, veremos cómo se realiza la documentación de la prueba y optimización del código y trabajaremos 
                con las herramientas que nos permiten representar de forma gráfica (diagramas) las clases y su comportamiento</p>
            <p class="profesor">Profesor: <?php print $profesornameM04. " ". $profesorlastnameM04?></p>
            <p class="horas">223h</p>
            <form action="?url=asignaturacontroller" method="post">
                <div class="content-btn">   
                <?php
                    // RECORRERME EL ARRAY ASOCIATIVO DE MATRICULA
                      /* 
                         Obtenemos toddas las matriculas del alumno y nos recorremos el array, preguntamos si la id de la asignatura registrada es igual a la id de la 
                        asignatura. Si coincide es que el usaurio ya se ha registrado y pondremos un parrafo donde diga que ya se ha matriculado,
                        si no coincide con ningun registro es que no se ha matriculado en esa asignatura asi que pondremos un boton para que pueda hacerlo
                    */
                      $matriculas= $dbManager->getMatricula($alumnoid);
                      $encontrado = false;
                       foreach($matriculas as $matricula){
                            $matriculaid=$matricula['id_asignatura'];
                            if($matriculaid==$M04id){
                                $encontrado=True;
                                break;
                            }
                        }
                        if( $encontrado==True){
                            echo "<p>Ya te has matriculado</p>";
                        }if($encontrado==False){
                            echo '<button class="btn-matricular" name="btn-matricular" value="M04" type="submit">Matricularme</button>';
                        }
                    ?>
        
                </div>
            </form>
        </div>
    </div>
</body>