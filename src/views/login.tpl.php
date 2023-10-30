<?php
    include_once 'partials/header.tpl.php';
?>
<body>
    <h1><?= $title; ?></h1>
    <?php
    ?>
    <!-- PONER UN VALUE Y PONER LOS DATOS DE LA COOKIE SI LE HA DADO A RECUERDAME -->
    <form class="login" action="?url=loginaction" method="post">
        <input class="email" type="email" name="email" required placeholder="EMAIL" <?php if(isset($_COOKIE['password']) && isset($_COOKIE['email'])){
            $email = $_COOKIE['email'];
            echo 'value="' . $email . '"';
        }?>> 
        <input type="password" name="password" required placeholder="PASSWORD" <?php if(isset($_COOKIE['password']) && isset($_COOKIE['email'])){
            $pass = $_COOKIE['password'];
            echo 'value="' . $pass . '"';
        }?>>
        <div class="recuerdame">
            recuerdame <input type="checkbox" class="check" name="recuerdame">
        </div>
        
        <button class="btn-loginaction" type="submit">Log in</button>

    </form>
    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>