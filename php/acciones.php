<?php
    include("conexion.php");

    $id_producto=$_POST["id_producto"];
    $nombre=$_POST["nombre"];
    $costo=$_POST["costo"];
    $precio=$_POST["precio"];
    $precios_anteriores=$_POST["precios_anteriores"];
    $precio_caja=$_POST["precio_caja"];
    $cantidad_caja=$_POST["cantidad_caja"];
    $id_categoria=$_POST["id_categoria"];
    $id_distribuidor=$_POST["id_distribuidor"];
    
    /*echo $nombre . "<br>";
    echo $costo . "<br>";
    echo $precio . "<br>";
    echo $precios_anteriores . "<br>";
    echo $precio_caja . "<br>";
    echo $cantidad_caja . "<br>";
    echo $id_categoria . "<br>";
    echo $id_distribuidor . "<br>";
    echo $id_producto . "<br>";*/

    if(isset($_POST["actualizar"])){
        $conexion=$base->query("SELECT precio
        FROM productos WHERE id_producto='" . $id_producto . "'");
        $registro=$conexion->fetch(PDO::FETCH_ASSOC);

        if($registro["precio"]==$precio){
            echo "no hubo cambios";
        }
        else{
            if($precios_anteriores==""){
                $precios_anteriores=$registro["precio"];
            }
            else{
                $datos=explode(",",$precios_anteriores);
                if(sizeof($datos)==20){
                    $precios_anteriores=substr($precios_anteriores,strlen($datos[0])+1);
                }
                $precios_anteriores=$precios_anteriores . "," . $registro["precio"];
                var_dump($datos);
            }
        }

        $registro=$conexion->fetch(PDO::FETCH_ASSOC);
        echo "Actualizar";
        $sql="UPDATE productos SET nombre=:nombre, costo=:costo, precio=:precio, precio_caja=:precio_caja, precios_anteriores=:precios_anteriores, cantidad_caja=:cantidad_caja WHERE id_producto=:id_producto";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":costo"=>$costo, ":precio"=>$precio, ":precio_caja"=>$precio_caja, ":cantidad_caja"=>$cantidad_caja, ":id_producto"=>$id_producto, "precios_anteriores"=>$precios_anteriores));
        header("Location:../producto.php?id=" . $id_producto);
    }
    

    if(isset($_POST["eliminar"])){
        $base->query("DELETE FROM productos WHERE id_producto='" . $id_producto . "'");
        header("Location:../index.php");
    }
    

    if(isset($_POST["agregar"])){
        $sql="INSERT INTO productos values(:id_producto, :nombre, :costo, :precio, :precio_caja, :cantidad_caja, :precios_anteriores, :id_categoria, :id_distribuidor)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":id_producto"=>$id_producto, ":nombre"=>$nombre, ":costo"=>$costo, ":precio"=>$precio, ":precio_caja"=>$precio_caja, 
        ":cantidad_caja"=>$cantidad_caja, ":precios_anteriores"=>$precios_anteriores, ":id_categoria"=>$id_categoria, ":id_distribuidor"=>$id_distribuidor));
        header("Location:../producto.php?id=" . $id_producto);
    }


    /*
    if(isset($_POST["create"])){
        echo "Crear";
        $sql="INSERT INTO administradores values(null, :nombre, :password, :rol)";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":password"=>$password, ":rol"=>$rol));
    }

    if(isset($_POST["update"])){
        echo "Actualizar";
        $id=$_POST["0"];
        $sql="UPDATE administradores SET nombre=:nombre, password=:password, rol=:rol WHERE id_administradores=:id";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":nombre"=>$nombre, ":password"=>$password, ":rol"=>$rol, ":id"=>$id));
    }
    header("Location:CRUDadmins.php");*/
?>