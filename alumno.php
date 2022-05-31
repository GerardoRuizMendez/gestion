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
        $conexion=$base->query("SELECT * FROM alumnos WHERE id_alumno=" . $_GET["nombre"]);
        $r=$conexion->fetch(PDO::FETCH_ASSOC);
        //$r=$conexion->fetch(PDO::FETCH_ASSOC);
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
        <h1>BIENVENIDOS</h1>
        <div class="alumno">
            <p class="centrarTexto">Nombre: <span><?php echo $r["nombre"] ?></span></p>
            <p class="centrarTexto">Numero de control: <span><?php echo $r["id_alumno"] ?></span></p>
        </div>
        <form class="servicios">
            <div>
                <label for="">Servicios</label>
                <label for="">Costo</label>
                <label for="">Estado</label>
                <label for="">Archivo</label>
                <label for="">Acciones</label>
            </div>
        </form>
        <?php
        $conexion=$base->query("SELECT * FROM pago p inner join alumnos a ON p.id_alumno=a.id_alumno 
        inner join servicios c ON c.id_servicio=p.id_servicio WHERE a.id_alumno=" . $_GET["nombre"]);
        while($r=$conexion->fetch(PDO::FETCH_ASSOC)){
        $archivo="Archivo no subido";
        if($r["archivo"]=="si"){
            $archivo="Archivo subido correctamente";
        }
        ?>
        <form action="archivo.php" class="servicios">
            <div>
                <input type="hidden" name="folio" value="<?php echo $r["folio"]; ?>">
                <input type="hidden" name="nombre" value="<?php echo $r["id_alumno"]; ?>">
                <input type="text" disabled name="nombre" id="" value="<?php echo $r["servicio"]; ?>">
                <input type="text" disabled name="costo" id="" value="<?php echo $r["costo"]; ?>">
                <input type="text" disabled name="estado" id="" value="<?php echo $r["estado"]; ?>">
                <input type="text" disabled name="archivo" id="" value="<?php echo $archivo; ?>">
                <input type="submit" name="editar" value="editar">
                <input type="submit" name="eliminar" value="eliminar">
            </div>
            
        </form>
        <?php
        }
        ?>
    </main>

    <footer class="footer">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>

    <script src="build/js/bundle.js"></script>
</body>

</html>