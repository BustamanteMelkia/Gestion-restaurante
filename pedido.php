<?php
    include('inc/templates/head.php');
?>
<header class="header barra">
    <a href="index.php"><h1 class="title">Bus_Mel</h1></a>
    <?php include('inc/templates/nav.php'); ?>
</header>
<main class="main">
    <form id="formulario" class="formulario" enctype="multipart/form-data">
        <h2>
            <?php echo isset($platillo)? 'Editar ':'Registrar un nuevo platillo'?>
        </h2>

        <div class="formulario-campo">
            <label for="nombre">Nombre</label>
            <input  
                type="text" 
                id="nombre" 
                name="nombre" 
                placeholder="Nombre del platillo"
                value="<?php echo isset($platillo)? $platillo['nombre']:""?>"
            >
        </div>
        <div class="formulario-campo">
            <label for="precio">Precio</label>
            <input 
                type="text" 
                name="precio" 
                id="precio" 
                placeholder="Precio del platillo" 
                value="<?php echo isset($platillo)? $platillo['precio']:""?>"
            >
        </div>
        <div class="formulario-campo">
            <label for="stock">Stock</label>
            <input 
                type="text" 
                name="stock" 
                id="stock" 
                placeholder="Stock del día"
                value="<?php echo isset($platillo)? $platillo['stock']:""?>"
            >
        </div>
        <div class="formulario-campo">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo">
                <option value="">--Seleccione el tipo de comida--</option>
                <?php
                    $resultado = obtenerTipos();
                    while($tipo = $resultado->fetch_assoc()){ ?>
                        <option 
                            value="<?php echo $tipo['id_tipo'] ?>"
                            <?php 
                                if(isset($platillo))
                                    if($platillo['id_tipo_platillo']==$tipo['id_tipo'])
                                        echo 'selected';
                            ?>
                        >
                        <?php echo $tipo['tipo'] ?> 
                        </option>
                <?php } ?>
            </select>
        </div>
        <div class="formulario-campo textarea">
            <label for="descripcion">Descripción</label>
            <textarea 
                name="descripcion" 
                id="descripcion" 
                placeholder="Decripción del platillo"
            ><?php echo isset($platillo)? $platillo['descripcion']: '' ?></textarea>
        </div>
        <div class="formulario-campo">
            <label for="descripcion">Subir imagen</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <div class="formulario-campo submit">
            <input 
                type="hidden" 
                name="accion" 
                id="accion" 
                value="<?php echo isset($platillo)? 'editar':'insertar'?>"
            >
            <input 
                type="hidden" 
                name="id" 
                id="id" 
                value="<?php echo isset($_GET['id'])? $_GET['id']:'' ?>"
            >
            <input class="btn" type="submit" value="Registrar platillo">
        </div>
        </form>
        
