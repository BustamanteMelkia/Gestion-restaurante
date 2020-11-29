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
                <img src="images/platillos/<?php echo $platillo['urlImagen']; ?>" alt="Imagen platillo">
            </figure>
            <div class="platillo-detalles">
                <h3 class="platillo-detalles_nombre"><?php echo $platillo['nombre']; ?></h3>
                <p class="platillo-detalles_descripcion"><?php echo $platillo['descripcion']; ?></p>
                <h4 class="platillo-detalles_tipo">Tipo: <span><?php echo $platillo['tipo']; ?></span></h4>
                <h4 class="platillo-detalles_stock">Disponibilidad: <span><?php echo $platillo['stock']; ?></span></h4>
                <h4 class="platillo-detalles_precio">Precio: <span><?php echo $platillo['precio']; ?></span></h4>
                <button class="btn" id="pedido"><i class="fas fa-cart-plus"></i></button>
            </div>
        </article>
        <div class="pedido-contenedor"> 
            <div class="pedido">
                <div class="formulario-campo">
                    <label for="cantidad">Cantidad</label>
                    <input 
                        type="number" 
                        name="cantidad" 
                        id="cantidad" 
                        placeholder="Número de porciones"
                        min="1"
                        max="<?php echo $platillo['stock'] ?>"
                    >
                </div>
                <input type="hidden" id="precio" value="<?php echo $platillo['precio']; ?>">
                <label class="importe"> Importe: <span>$0.0</span></label>
                <div class="pedido-options">
                    <button id="pagar" class="btn" data-id="<?php echo $platillo['id_platillo'] ?>">
                        <i class="fas fa-hand-holding-usd"></i>
                    </button>
                    <button id="cancelar" class="btn">
                        <i class="fas fa-window-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </main>
    <script src="js/scripts.js?v=2"></script>
</body>
</html>