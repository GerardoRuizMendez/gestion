<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Salsas</title>
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
        include("php/conexion.php");
        $conexion=$base->query("SELECT p.id_producto, p.nombre, p.costo, p.precio, p.precio_caja, 
        p.cantidad_caja, p.precios_anteriores, p.id_categoria, p.id_distribuidor
        FROM productos p INNER JOIN categorias c ON p.id_categoria=c.id_categoria  
        WHERE c.nombre='" . $_GET["categoria"] . "'");
    ?>

        <h1><?php echo $_GET["categoria"] ?></h1>
        <table border="0" align="center">
            <tr>
                <td class="primera_fila">Producto</td>
                <td class="primera_fila">Costo</td>
                <td class="primera_fila">Precio</td>
                <td class="primera_fila">Precio por caja</td>
                <td class="primera_fila">cantidad por caja</td>
                <td class="primera_fila">Precios anteriores</td>
                <td class="primera_fila">Categoria</td>
                <td class="primera_fila">Distribuidor</td>

            </tr>

            <?php
                while($registro=$conexion->fetch(PDO::FETCH_OBJ)){
                    //echo('<pre>');
                    //var_dump($registro);
                    //echo('</pre>');
                    ?><form action='accionesCliente.php' method='post'><?php
                    ?><tr><?php
                    $n=0;
                    foreach($registro as $r){
                        if($n==0){
                            ?><input type='hidden' name='<?php echo $n;?>' value='<?php echo $r;?>'><?php
                        }else if($n==7){
                            $categorias=$base->query("SELECT nombre FROM categorias");
                            ?>
                            <td class='noPad'>
                            <select>
                                <?php
                                while($categoria=$categorias->fetch(PDO::FETCH_OBJ)){
                                    foreach($categoria as $c){
                                        ?>
                                            <option value="1"><?php echo $c ?></option>
                                        <?php
                                    }
                                }
                                //
                                ?>
                            </select>
                            </td>
                            <?php
                        }else if($n==8){
                            $categorias=$base->query("SELECT nombre FROM distribuidores");
                            ?>
                            <td class='noPad'>
                            <select>
                                <?php
                                while($categoria=$categorias->fetch(PDO::FETCH_OBJ)){
                                    foreach($categoria as $c){
                                        ?>
                                            <option value="1"><?php echo $c ?></option>
                                        <?php
                                    }
                                }
                                //
                                ?>
                            </select>
                            </td>
                            <?php
                        }else{
                            
                            ?><td class='noPad'><?php
                            ?><input class='ancho' type='text' name='<?php echo $n;?>' value='<?php echo $r;?>'><?php
                            ?></td><?php
                        }
                        $n++;
                    }
                    ?><td><input type='submit' class='quitarMargen boton botonVerde' name='delete' id='del' value='Borrar'></td><?php
                    ?><td><input type='submit' class='quitarMargen boton botonVerde' name='update' id='up' value='Actualizar'></td><?php
                    ?></tr><?php
                    ?></form><?php
                }
            ?>
                <form action='accionesCliente.php' method='post'>
                    <tr>
                        <td><input type='text' name='1'></td>
                        <td><input type='text' name='4'></td>
                        <td><input type='text' name='5'></td>
                        <td class=''><input type='submit' class='quitarMargen boton botonVerde' name='create' id='cr' value='Insertar'></td>
                    </tr>
                </form>
        </table>

        <p>&nbsp;</p>
</body>

</html>