<?php
    function obtenerPlatillos(){
        include("conexion.php");
        try{
            $consulta= "SELECT id_platillo,nombre,descripcion,precio, id_tipo_platillo,stock, urlImagen FROM platillos";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }
    function obtenerPlatillo($id){
        include("conexion.php");
        try{
            $consulta= "SELECT id_platillo,nombre,descripcion,precio, id_tipo_platillo,stock, urlImagen FROM platillos WHERE id_platillo=$id";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }
    function obtenerTipos(){
        include("conexion.php");
        try{
            $consulta= "SELECT id_tipo,tipo FROM tipo_platillo";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }
?>