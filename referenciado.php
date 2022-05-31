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
        if($_POST["nombre"]=="" OR $_POST["pass"]==""){
            header("Location:bienvenido.php?correcto=no");
        }
        $conexion=$base->query("SELECT * FROM alumnos WHERE id_alumno=" . $_POST["nombre"] . " AND pass='" . $_POST["pass"] . "'");
        $r=$conexion->fetch(PDO::FETCH_ASSOC);
        if(!$r){
            header("Location:bienvenido.php?correcto=no");
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

    <main class="contenedor cuadro formulario sombra referenciado">

        <h1>Datos del alumno</h1>
        <div class="alumno">
            <p class="centrarTexto">Nombre: <span><?php echo $r["nombre"] ?></span></p>
            <p class="centrarTexto">Numero de control: <span><?php echo $r["id_alumno"] ?></span></p>
        </div>

        <p class="seleccione_texto">
            SELECCIONE EL CONCEPTO A PAGAR (si es mas de un concepto deberas generar varias referencias). 
            Si no conoces el concepto que tienes que pagar escribe a el departamento de recursos financieros
        </p>
        <form action="php/correo.php" method="POST">
            <fieldset>
                <legend>Seleccione su concepto de pago</legend>
                <select name="servicio" id="">
                    <option value="0" selected disabled>SELECCIONE UNA OPCION</option>
                    <option value="1">EXPEDICION DE CERTIFICADOS</option>
                    <option value="2">EXPEDICION DE CONSTANCIAS</option>
                    <option value="3">INSCRIPCION A LA INSTITUCION</option>
                    <option value="4">INSCRIPCION Y REINSCRIPCION A LICENCIATURA E INGENIERIA</option>
                    <option value="5">INSCRIPCION Y REINSCRIPCION A NIVEL MAESTRIA</option>
                    <option value="6">INSCRIPCION Y REINSCRIPCION A NIVEL DOCTORADO</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $r["id_alumno"] ?>">
                <input type="submit" value="Continuar">
            </fieldset>
        </form>


        
    </main>

    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>

    <script src="build/js/bundle.js"></script>
</body>

</html>