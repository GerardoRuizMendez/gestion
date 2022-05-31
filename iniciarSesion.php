<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        if(isset($_GET["correcto"])){
            echo "<script type='text/javascript'>alert('Contraseña y/o usuario incorrectos');</script>";
        }
    ?>
    <header class="header">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="../index.php">
                    <img src="build/img/logo.png" alt="Logo">
                </a>
            </div>
        </div>
    </header>

    <main class="contenedor formulario sesion sombra">

        <form class="Contacto" action="php/comprobarUsuario.php" method="post">
            <div class="Contacto_centrar">
                <legend>Inicio de sesión</legend>
                <img src="../build/img/login.png" alt="Inicio de sesion">
            </div>
            <div>
                <label for="nombre">Usuario:</label> <input class="corto" type="text" name="nombre">
                <label for="nombre">Contraseña:</label> <input class="corto" type="password" name="pass" placeholder="****">
            </div>
            <div>
                <input type="submit" value="Entrar" name="enviar">
            </div>
        </form>
    </main>
    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2021 &copy;</p>
    </footer>
    <script src="build/js/bundle.js"></script>
</body>

</html>