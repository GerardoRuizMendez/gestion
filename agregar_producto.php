<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Agregar producto</title>
    <link rel="stylesheet" href="../../build/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="/index.php">
                    <img src="../../build/img/logo.png" alt="hola">
                </a>

                <nav class="navegacion">
                    <a href="iniciarSesion.php">Ingresar</a>
                </nav>
            </div>
        </div>
    </header>
    <?php
        if(!isset($_COOKIE["estado"])){
            header("Location:index.php");
        }
        include("php/conexion.php");
    ?>
        <main class="contenedor resultados cuadro sombra">
            <h1>Agregar producto</h1>

            <form action="php/acciones.php" method="post">
                <fieldset class="buscar producto">
                    <legend>Datos del producto</legend>

                    <label for="id_producto">Id del producto:</label>
                    <input type="text" name="id_producto" value="">
                    <input type="hidden" name="precios_anteriores" value="">

                    <label for="">Producto:</label>
                    <input type="text" name="nombre" value="">

                    <label for="">Costo:</label>
                    <input type="text" name="costo" value="">

                    <label for="">Precio:</label>
                    <input type="text" name="precio" value="">

                    <label for="">Precio por caja:</label>
                    <input type="text" name="precio_caja" value="">

                    <label for="">Cantidad por caja:</label>
                    <input type="text" name="cantidad_caja" value="">

                    <label for="id_categoria">Categoria:</label>
                    <select name="id_categoria" id="">
                        <?php
                            $categorias=$base->query("SELECT id_categoria, nombre FROM categorias");
                            while($categoria=$categorias->fetch(PDO::FETCH_ASSOC)){
                                ?><option value="<?php echo $categoria["id_categoria"]; ?>"><?php echo $categoria["nombre"] ?></option><?php
                            }
                        ?>
                    </select>

                    <label for="id_distribuidor">Distribuidor:</label>
                    <select name="id_distribuidor" id="">
                        <?php
                            $distribuidores=$base->query("SELECT id_distribuidor, nombre FROM distribuidores");
                            while($distribuidor=$distribuidores->fetch(PDO::FETCH_ASSOC)){
                                ?><option value="<?php echo $distribuidor["id_distribuidor"]; ?>"><?php echo $distribuidor["nombre"]; ?></option><?php
                            }
                        ?>
                    </select>
                </fieldset>
                <input type="submit" value="Agregar" name="agregar">
            </form>
        </main>
        <p>&nbsp;</p>

    <footer class="footer ">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>
</body>



</html>