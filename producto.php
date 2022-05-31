<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Producto</title>
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
        $conexion=$base->query("SELECT id_producto, nombre, costo, precio, precio_caja, 
        cantidad_caja, precios_anteriores, id_categoria, id_distribuidor
        FROM productos WHERE id_producto='" . $_GET["id"] . "'");

        $registro=$conexion->fetch(PDO::FETCH_ASSOC);
    ?>
        <main class="contenedor resultados cuadro sombra">
            <h1><?php echo $registro["nombre"]; ?></h1>

            <form action="php/acciones.php" method="post">
                <fieldset class="buscar producto">
                    <legend>Datos del producto</legend>
                    <input type="hidden" name="id_producto" value="<?php echo $registro["id_producto"]; ?>">
                    <input type="hidden" name="precios_anteriores" value="<?php echo $registro["precios_anteriores"]; ?>">

                    <label for="">Producto:</label>
                    <input type="text" name="nombre" value="<?php echo $registro["nombre"]; ?>">

                    <label for="">Costo:</label>
                    <input type="text" name="costo" value="<?php echo $registro["costo"]; ?>">

                    <label for="">Precio:</label>
                    <input type="text" name="precio" value="<?php echo $registro["precio"]; ?>">

                    <label for="">Precio por caja:</label>
                    <input type="text" name="precio_caja" value="<?php echo $registro["precio_caja"]; ?>">

                    <label for="">Cantidad por caja:</label>
                    <input type="text" name="cantidad_caja" value="<?php echo $registro["cantidad_caja"]; ?>">

                    <label for="id_categoria">Categoria:</label>
                    <select name="id_categoria" id="">
                        <?php
                            $categorias=$base->query("SELECT id_categoria, nombre FROM categorias");
                            while($categoria=$categorias->fetch(PDO::FETCH_ASSOC)){
                                if($categoria["id_categoria"]==$registro["id_categoria"]){
                                    ?><option value="<?php echo $categoria["id_categoria"]; ?>" selected><?php echo $categoria["nombre"] ?></option><?php
                                }
                                else{
                                    ?><option value="<?php echo $categoria["id_categoria"]; ?>"><?php echo $categoria["nombre"] ?></option><?php
                                }
                            }
                        ?>
                    </select>

                    <label for="id_distribuidor">Distribuidor:</label>
                    <select name="id_distribuidor" id="">
                        <?php
                            $distribuidores=$base->query("SELECT id_distribuidor, nombre FROM distribuidores");
                            while($distribuidor=$distribuidores->fetch(PDO::FETCH_ASSOC)){
                                if($distribuidor["id_distribuidor"]==$registro["id_distribuidor"]){
                                    ?><option value="<?php echo $distribuidor["id_distribuidor"]; ?>" selected><?php echo $distribuidor["nombre"]; ?></option><?php
                                }
                                else{
                                    ?><option value="<?php echo $distribuidor["id_distribuidor"]; ?>"><?php echo $distribuidor["nombre"]; ?></option><?php
                                }
                            }
                        ?>
                    </select>
                </fieldset>
                <input type="submit" value="actualizar" name="actualizar">
                <input type="submit" value="eliminar" name="eliminar">
            </form>

            <p>Porcentaje de ganancias:</p>
            <p>$5 por producto (20%)</p>
        </main>
        <p>&nbsp;</p>

    <footer class="footer ">
        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>
</body>



</html>