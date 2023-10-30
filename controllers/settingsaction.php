<?PHP

// Verificar si se ha enviado un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['theme'])) {
        // Recoger el valor del select
        $theme = $_POST['theme'];

        /*
            Preguntamos el valor del select si vale una cosa o la otra ya que solo hay dos posibles respuestas,
            con la que coincida crearemos una cookie y enviamos al usaurio al dashboard
        */ 
        if ($theme === 'light') {
            setcookie('theme', 'light',time() + 3600, '/');
            header('Location: ?url=dashboard');
        } elseif ($theme === 'dark') {
            setcookie('theme', 'dark',time() + 3600, '/');
            header('Location: ?url=dashboard');
        } else {
            header('Location: ?url=dashboard');
        }
    }
    if(isset($_POST['idioma'])){
        $idioma = $_POST['idioma'];
        if($idioma=='en'){
            setcookie('idioma', 'en',time() + 3600, '/');
            header('Location: ?url=dashboard');
        }if($idioma=='es'){
            setcookie('idioma', 'en',time() - 3600, '/');
            setcookie('idioma', 'es',time() + 3600, '/');
            header('Location: ?url=dashboard');
        }
    }
}
?>
