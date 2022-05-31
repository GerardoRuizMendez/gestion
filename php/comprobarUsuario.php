<?php
    include("conexion.php");
    try{
        $nombre=htmlentities(addslashes($_POST["nombre"]));
        $pass=htmlentities(addslashes($_POST["pass"]));

        $sql="SELECT * FROM admins WHERE nombre = '" . $nombre . "' AND contra = '" . $pass . "'";
        $resultado=$base->query($sql);
        if($registro=$resultado->fetch(PDO::FETCH_ASSOC)){//da el numero de filas afectadas por la consulta
            setcookie("estado", "activado", time()+3600*24*365, "/");

            header("location:../index.php");
        }else{
            header("location:../iniciarSesion.php?correcto=no");
        }
    }catch(Exception $e){
        die("Error: " . $e->getMessage());
    }
?>