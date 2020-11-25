<?php
    if(isset($_POST['accion'])){
        if(cargarImagen()){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $tipo = $_POST['tipo'];
            $imagen = basename($_FILES["imagen"]["name"]);

            if($_POST['accion']=='insertar'){
                echo insertarPlatillo($nombre, $descripcion, $precio, $stock, $tipo, $imagen);
            }else if($_POST['accion']=='editar'){
                $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
                echo actualizarPlatillo($id, $nombre, $descripcion, $precio, $stock, $tipo, $imagen);
            }
        }else{
            $respuesta = array(
                "respuesta"=>"error",
                "mensaje"=>"Error al cargar la imagen"
            );
        }
    }
    if(isset($_GET['accion'])){
        if($_GET['accion'] == 'eliminar'){
            echo eliminarPlatillo($_GET['id']);
        }
    }

    function cargarImagen(){
        $rutaDestino = "../../images/platillos/";
        $nombreImagen = basename($_FILES["imagen"]["name"]);
        $status = move_uploaded_file($_FILES["imagen"]["tmp_name"],$rutaDestino . $nombreImagen);
        return $status;
    }
    function insertarPlatillo($nombre, $descripcion, $precio, $stock, $tipo, $imagen){
        // importar el módulo de conexión a la base de datos
        include("../funciones/conexion.php");
        // sentencia preparada
        $stm = $conn->prepare("INSERT INTO platillos (nombre,descripcion,precio,stock, id_tipo_platillo, urlImagen) VALUES (?, ?, ?, ?, ?, ?)");
        // Enlazar los parámetros con sus respectivos valores
        $stm->bind_param("ssdiis",$nombre,$descripcion,$precio,$stock,$tipo,$imagen);
        $stm->execute();

        if($stm->affected_rows>0){
            $respuesta = array(
                "respuesta"=>"correcto",
                "mensaje"=>"Platillo insertado correctamente",
                "accion"=>$_POST['accion'],
                "id_platillo"=>$stm->insert_id
            );
        }else{
            $respuesta = array(
                "respuesta"=>"error",
                "mensaje"=>"Error al insertar los datos del platillo"
            );
        }
        $stm->close();
        $conn->close();
        return json_encode($respuesta);
    }
    function actualizarPlatillo($id,$nombre, $descripcion, $precio, $stock, $tipo, $imagen){
        // importar el módulo de conexión a la base de datos
        include("../funciones/conexion.php");
        $stm = $conn->prepare("UPDATE platillos SET nombre=?, descripcion=?, precio=?, stock=?, id_tipo_platillo=?, urlImagen=? WHERE id_platillo=?");
        $stm->bind_param("ssdiisi",$nombre, $descripcion, $precio, $stock, $tipo, $imagen, $id);
        $stm->execute();
        if($stm->affected_rows == 1){
            $respuesta = array(
                'respuesta'=>'correcto',
                'mensaje'=>'Platillo actualizado correctamente',
                'accion'=>$_POST['accion'],
                'rows'=> $stm->affected_rows,
                'id'=>$id
            );
        }else{
            $respuesta = array(
                'respuesta'=>'error',
                'mensaje'=>'Error al actualizar los datos del platillo',
                'rows'=> $stm->affected_rows,
                'id'=>$id
            );
        }
        $stm->close();
        $conn->close();
        return json_encode($respuesta);
    }
    function eliminarPlatillo($id){
        include('../funciones/conexion.php');
        try {
            $stm = $conn->prepare("DELETE FROM platillos WHERE id_platillo=?");
            $stm->bind_param("i",$id);
            $stm->execute();
            $respuesta = array(
                'respuesta'=>'correcto',
                'mensaje'=>'Platillo eliminado correctamente',
                'id'=>$id
            );
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta'=>'error',
                'mensaje'=>$e.getMessage(),
                'id'=>$id
            );
        }
        return json_encode($respuesta);
    }
?>