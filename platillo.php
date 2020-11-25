<?php
    include('inc/templates/head.php');
    include('inc/funciones/consultas.php');
    if(!isset($_GET['id']))
        header('location: index.php');
?>

    <header class="header barra">
        <a href="index.php"><h1 class="title">Bus_Mel</h1></a>
        <?php include('inc/templates/nav.php'); ?>
    </header>

    <main class="main">
        <?php 
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $resultado = obtenerDatosPlatillo($id);
            $platillo = $resultado->fetch_assoc();
        ?>
        <article class="platillo">
            <figure class="platillo-contenedor-imagen">
                <img src="images/platillos/platillo1.jpg" alt="Imagen platillo">
            </figure>
            <div class="platillo-detalles">
                <h3 class="platillo-detalles_nombre"><?php echo $platillo['nombre']; ?></h3>
                <p class="platillo-detalles_descripcion"><?php echo $platillo['descripcion']; ?></p>
                <h4 class="platillo-detalles_tipo">Tipo: <span><?php echo $platillo['tipo']; ?></span></h4>
                <h4 class="platillo-detalles_stock">Disponibilidad: <span><?php echo $platillo['stock']; ?></span></h4>
                <h4 class="platillo-detalles_precio">Precio: <span><?php echo $platillo['precio']; ?></span></h4>
            </div>
        </article>
    </main>
    
</body>
</html>