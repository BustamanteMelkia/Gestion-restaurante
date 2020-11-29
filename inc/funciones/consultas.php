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
    function obtenerDatosPlatillo($id){
        include("conexion.php");
        try{
            $consulta= "SELECT P.id_platillo,P.nombre,P.descripcion,P.precio, P.id_tipo_platillo, T.tipo,P.stock, P.urlImagen FROM platillos P, tipo_platillo T WHERE P.id_platillo=$id AND P.id_tipo_platillo=T.id_tipo";
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
            $stm=$conn->prepare("SELECT SUM(total) as ventaDelDia FROM pedidos WHERE fecha=?");
            $stm->bind_param("s",$fecha);
            $stm->execute();
            $result = $stm->get_result();
            $fecha = $result->fetch_assoc();
            $stm->close();
            $conn->close();
            return $fecha['ventaDelDia'];
        }catch(Exception $e){
            echo 'Error al cargar los datos de la base de datos';
            return false;
        }
    }
?>