<?php
    function obtenerPlatillos(){
        include("conexion.php");
        try{
            $consulta= "SELECT id_comida,nombre,descripcion,precio, id_tipo_comida,stock, urlImagen FROM comidas";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }
?>