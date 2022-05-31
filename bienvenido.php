<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>ULA</title>
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
                <a href="/index.php">
                    <img src="build/img/logo.png" alt="Logo">
                </a>

                <nav class="navegacion">
                    <a href="iniciarSesion.php"></a>
                </nav>
            </div>

            
        </div>
    </header>

    <p class="lidera">lidera tu futuro</p>

    <main class="contenedor cuadro formulario sombra finanzas">

        <form class="Contacto" action="referenciado.php" method="post">
            <fieldset>
                <legend>Secretaría de finanzas</legend>
                <div class="Contacto_centrar">
                    <img src="../build/img/login.png" alt="Inicio de sesion">
                </div>
                <div>
                    <label for="nombre">Usuario:</label> <input class="corto" autocomplete="new-password" type="text" name="nombre">
                    <label for="nombre">Contraseña:</label> <input class="corto" autocomplete="new-password" type="password" name="pass" placeholder="****">
                </div>
                <div>
                    <input type="submit" value="Iniciar sesión" name="enviar">
                </div>
            </fieldset>
        </form>
        <div class="datos">
            <div>
                <p>
                    Para el uso del Servicio de autenticacion, es indispensable contar con una cuenta
                    institucional
                </p>
            </div>
            <div>
                <h2>Alumnos</h2>
                <p>
                    Para asesoría: acuda al centro de control de servicios escolares de su escuela
                    o facultad
                </p>
            </div>
            <div>
                <h2>Administrativos/Docentes</h2>
                <p>
                    Puede ingresar con su cuenta de correo institucional ya que el usuario y contraseña
                    son los mismos
                </p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>

    <script src="build/js/bundle.js"></script>
</body>

</html>