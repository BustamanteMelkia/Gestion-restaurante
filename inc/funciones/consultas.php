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

    //Retorna el total de dinero de los productos de un pedido
    function getTotalPedido($id_pedido){
        include("conexion.php");
        try{
            $consulta= "SELECT total FROM pedidos WHERE id_pedido=$id_pedido";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }

    //Retorna el total de las ventas realizadas
    function getTotal(){
        include("conexion.php");
        try{
            $consulta= "SELECT SUM(total) FROM pedidos";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }

    //Retorna el total de las ventas realizadas en una fecha especifica
    function getTotalDia($fecha){
        include("conexion.php");
        try{
            $consulta= "SELECT SUM(total) FROM pedidos WHERE fecha=$fecha";
            return $conn->query($consulta);
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }
?>