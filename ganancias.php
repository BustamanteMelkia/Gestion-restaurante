<?php
    include('inc/templates/head.php');
    include('inc/funciones/consultas.php');
?>

    <header class="header barra">
        <a href="index.php"><h1 class="title">Bus_Mel</h1></a>
        <?php include('inc/templates/nav.php'); ?>
    </header>

    <main class="main">
        <?php 
            $fecha = getdate ()['year'].'-'.getdate ()['mon'].'-'.getdate ()['mday']; 
            $resultado = getTotalDia($fecha); 
        ?>
        <div class="ganancias">
            <h3 class="title">Ganancias</h3>
            <h4 class="platillo-detalles_tipo">Fecha: <span><?php echo $fecha; ?></span></h4>
            <h4 class="platillo-detalles_stock">Ventas: <span>$<?php echo $resultado; ?></span></h4>
        </div>
    </main>