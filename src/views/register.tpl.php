<?php
    include_once 'partials/header.tpl.php';
?>
<body>
    <h1><?= $title; ?></h1>
    <form action="?url=registeraction" method="post" class="register">
        <input type="text" name="name" required placeholder="NAME">
        <input type="text" name="lastname" required placeholder="LASTNAME">
        <input type="email" name="email" required placeholder="EMAIL"> 
        <input type="password" name="password" required placeholder="PASSWORD">
        <button class="btn-registeraction" type="submit">Register</button>

    </form>
    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>