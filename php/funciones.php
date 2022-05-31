<?php
    function obtener_precio_anterior($lista){
        if($lista==""){
            return "---";
        }
        $datos=explode(",",$lista);

        return $datos[sizeof($datos)-1];
    }
?>