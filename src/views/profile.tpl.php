<?php
    include_once 'partials/header.tpl.php';
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="navegacion" href="?url=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active navegacion" aria-current="page">Asignaturas</li>
  </ol>
</nav>
<body>
<h1><?= $title; ?></h1>


<?php
  //En el perfil del usaurio pondremos todos sus datos
    echo "<br><br><br>";
    echo "<p class='profile-user'>".$_COOKIE['userid'] ."</p>";
    print "<p class='profile-user'> ". $_COOKIE['email'] ."</p>";
    print "<p class='profile-user'> ". $_COOKIE['user']. "</p>";
    print "<p class='profile-user'>". $_COOKIE['lastname'] ."</p>";
?>
</body>
</html>
