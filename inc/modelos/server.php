<?php
    if(isset($_POST['accion'])){
        if($_POST['accion']=='insertar'){
            $rutaDestino = "../../images/";
            $nombreImagen = basename($_FILES["imagen"]["name"]);
            // Si la carga de la imagen es exitosa
            if(move_uploaded_file($_FILES["imagen"]["tmp_name"],$rutaDestino . $nombreImagen)){
                // importar el módulo de conexión a la base de datos
                include("../funciones/conexion.php");
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $stock = $_POST['stock'];
                $tipo = $_POST['tipo'];
                // sentencia preparada
                $stm = $conn->prepare("INSERT INTO platillos (nombre,descripcion,precio,stock, id_tipo_platillo, urlImagen) VALUES (?, ?, ?, ?, ?, ?)");
                // Enlazar los parámetros con sus respectivos valores
                $stm->bind_param("ssdiis",$nombre,$descripcion,$precio,$stock,$tipo,$nombreImagen);
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
            }else{
                $respuesta = array(
                    "respuesta"=>"error",
                    "mensaje"=>"Error al cargar la imagen"
                );
            }
            echo json_encode($respuesta);
        }
    }

?>