<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $_GET["distribuidor"] ?></title>
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
        include("php/funciones.php");
        $conexion=$base->query("SELECT p.id_producto, p.nombre, p.costo, p.precio, p.precio_caja, 
        p.cantidad_caja, p.precios_anteriores, p.id_categoria, p.id_distribuidor 
        FROM productos p INNER JOIN distribuidores d ON p.id_distribuidor=d.id_distribuidor  
        WHERE d.nombre='" . $_GET["distribuidor"] . "'");
    ?>
        <main class="contenedor resultados cuadro sombra">
        <h1 class="titulos"><?php echo $_GET["distribuidor"] ?></h1>

        <?php
            while($r=$conexion->fetch(PDO::FETCH_ASSOC)){
                $r["precios_anteriores"]=obtener_precio_anterior($r["precios_anteriores"]);
                //echo('<pre>');
                //var_dump($r);
                //echo('</pre>');
                ?>
                    

                <div class="resultado">
                    <?php if(isset($_COOKIE["estado"])){ ?>
                        <a href="producto.php?id=<?php echo $r["id_producto"];?>">
                    <?php } ?>
                        <div class="datos">
                            <div>
                                <p>
                                    <?php echo $r["nombre"];?>
                                </p>
                            </div>

                            <div class="extra">
                                <?php
                                $categorias=$base->query("SELECT id_categoria, nombre FROM categorias");
                                ?>
                                <div>
                                    <p>
                                        <?php
                                        while($c=$categorias->fetch(PDO::FETCH_ASSOC)){
                                            if($c["id_categoria"]==$r["id_categoria"]){
                                                echo $c["nombre"];
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div>
                                    <p>/</p>
                                </div>

                                <?php
                                $distribuidores=$base->query("SELECT id_distribuidor, nombre FROM distribuidores");
                                ?>
                                <div>
                                    <p>
                                        <?php
                                        while($c=$distribuidores->fetch(PDO::FETCH_ASSOC)){
                                            if($c["id_distribuidor"]==$r["id_distribuidor"]){
                                                echo $c["nombre"];
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="precios">
                            <?php if($r["precios_anteriores"]!="---" && isset($_COOKIE["estado"])){?>
                            <div class="cambio">
                                <div>
                                    <p>
                                        <?php echo "$" . $r["precios_anteriores"];?>
                                    </p>
                                </div>

                                <div>
                                    <p>➞</p>
                                </div>
                            <?php } ?>
                                <div>
                                    <p>
                                        <?php echo "$" . $r["precio"];?>
                                    </p>
                                </div>
                            </div>

                            <div>
                                <p>
                                    <?php echo "Caja: $" . $r["precio_caja"];?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            if(isset($_COOKIE["estado"])){ ?>
                </a>
            <?php } ?>
        </main>
        <p>&nbsp;</p>
    <footer class="footer">

        <p class="copyright">Todos los derechos Reservados 2022 &copy;</p>
    </footer>
</body>

</html>