<?php
    include('inc/templates/head.php');
?>
    <div class="header-contenedor">
        <header class="header">
            <h1 class="title">Bus_Mel</h1>
            <?php include('inc/templates/nav.php'); ?>
        </header>
    </div>

    <section class="platillos">
        <h2>Platillos</h2>
        <div class="platillos-contenedor">
        <?php
            include("inc/funciones/consultas.php");
            $resultado = obtenerPlatillos();
            while($platillo = $resultado->fetch_assoc()){    ?>
                <article class="platillo">
                    <a href="platillo.php?id=<?php echo $platillo['id_comida']?>">
                        <h3 class="platillo-nombre"><?php echo $platillo['nombre']?></h3>
                        <figure class="platillo-contenedor-imagen">
                            <img src="images/platillos/<?php echo $platillo['urlImagen']?>" alt="imagen-platillo">
                        </figure>
                    </a>
                </article>

        <?php } ?>
        </div>
    </section>
    
</body>
</html>