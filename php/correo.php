<?php
    include("conexion.php");
    $sql="SELECT * FROM servicios WHERE id_servicio=" . $_POST["servicio"];
    $resultado=$base->query($sql);
    $registro=$resultado->fetch(PDO::FETCH_ASSOC);

    $correo=$_POST["id"] . "@itoaxaca.edu.mx";
    $servicio=$registro["servicio"];

    var_dump($correo);
    var_dump($servicio);

    $mensaje="";

    $mensaje=$mensaje . "---URGENTE---\n";
    $mensaje=$mensaje . "Pago de " . $servicio . "  para el alumno con numero de control " . $_POST["id"] . "\n";
    $mensaje=$mensaje . "Referencia: 0005092618618215811\n";
    $mensaje=$mensaje . "Pagar en BBVBA antes de 3 dias de haber solicitado el servicio.\n\n";
    $mensaje=$mensaje . "Una vez realizado el pago, escribir tu nombre completo, numero de control y semestre en el comprobante de pago\n";
    $mensaje=$mensaje . "Y subirlo al siguiente formulario:\n";
    $mensaje=$mensaje . "http://localhost:3000/alumno.php?nombre=" . $_POST["id"] . "\n";

    mail($correo,"Correo de confirmacion",$mensaje);

    $sql="INSERT INTO pago values(null, 0, 'no pagado', 'no', :id_alumno, :id_servicio, null)";
    $resultado=$base->prepare($sql);
    $resultado->execute(array(":id_alumno"=>$_POST["id"], ":id_servicio"=>$_POST["servicio"]));
    header("Location:../bienvenido.php");
?>