<?php
    include("conexion.php");
    

    $conexion=$base->query("UPDATE pago SET archivo='si' WHERE folio=" . $_POST["folio"]);
    header("Location:/alumno.php?nombre=" . $_POST["nombre"]);
?>