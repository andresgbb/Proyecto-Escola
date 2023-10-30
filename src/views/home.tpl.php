<?php
    include_once 'partials/header.tpl.php';
?>
<body>
    <h1><?= $title;?></h1>
    <div class="home">
        <a class="btn-login" href="?url=login">LOGIN</a>
        <a class="btn-register" href="?url=register">REGISTER</a>
    </div>
    <!-- Si el usuario no ha aceptado las cookies o las cookies necesarias se lanzara el modal -->
    <?php include_once 'partials/footer.tpl.php' ; 
        if(!isset($_COOKIE['cookies_consent'])) include_once 'src/views/modal.tpl.php';
    ?>
        <!-- Este es el JS para el modal -->
      <script>
           window.addEventListener('DOMContentLoaded', function() {
            // Verificar si el usuario ha aceptado las cookies previamente
            var hasAcceptedCookies = sessionStorage.getItem('cookiesAccepted');

            if (!hasAcceptedCookies) {
                var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
                myModal.show();

                // Agregar un controlador de eventos al botón de aceptar
                var acceptCookiesButton = document.getElementById('acceptCookiesButton');
                acceptCookiesButton.addEventListener('click', function() {
                    // Marcar las cookies como aceptadas
                    sessionStorage.setItem('cookiesAccepted', 'true');

                    // Ocultar el modal
                    myModal.hide();
                });
            }
        });
    </script>
</body>
</html>