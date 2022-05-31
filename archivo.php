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
        include("php/conexion.php");
        if(isset($_GET["eliminar"])){
            $conexion=$base->query("DELETE FROM pago WHERE folio=" . $_GET["folio"]);
            header("Location:/alumno.php?nombre=" . $_GET["nombre"]);
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

    <main class="contenedor cuadro formulario sombra ">
        <h2 class="fw-700">Recepción de comprobante de pago</h2>

        <form class="" action="php/acciones_editar.php" method="post">
            <input type="hidden" name="nombre" value="<?php echo $_GET['nombre'] ?>">
            <input type="hidden" name="folio" value="<?php echo $_GET['folio'] ?>">
            <fieldset>
                <legend>Secretaría de finanzas</legend>


                <label for="">Selecciona el servicio pagado:</label>
                <select name="servicio" id="">
                    <option value="0" selected disabled>SELECCIONE UNA OPCION</option>
                    <option value="1">EXPEDICION DE CERTIFICADOS</option>
                    <option value="2">EXPEDICION DE CONSTANCIAS</option>
                    <option value="3">INSCRIPCION A LA INSTITUCION</option>
                    <option value="4">INSCRIPCION Y REINSCRIPCION A LICENCIATURA E INGENIERIA</option>
                    <option value="5">INSCRIPCION Y REINSCRIPCION A NIVEL MAESTRIA</option>
                    <option value="6">INSCRIPCION Y REINSCRIPCION A NIVEL DOCTORADO</option>
                </select>

                <label for="archivo">Ingresa tu comprobante de pago (Formato .jpg o .png)</label>
                <input type="file" accept="image/*" name="archivo" id="">

                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </main>

    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>

    <script src="build/js/bundle.js"></script>
</body>

</html>