<?php
    include('inc/templates/head.php');
?>

    <header class="header barra">
        <a href="index.php"><h1 class="title">Bus_Mel</h1></a>
        <?php include('inc/templates/nav.php'); ?>
    </header>

    <main class="main">
        <article class="platillo">
            <figure class="platillo-contenedor-imagen">
                <img src="images/platillo1.jpg" alt="Imagen platillo">
            </figure>
            <div class="platillo-detalles">
                <h3 class="platillo-detalles_nombre">Mole poblano</h3>
                <p class="platillo-detalles_descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias provident et temporibus debitis laudantium. Quasi ut sequi hic veniam laudantium beatae enim. Harum, officiis! Earum aliquid molestias repellendus minima ullam.  Quasi ut sequi hic veniam laudantium beatae enim. Harum, officiis! Earum aliquid molestias repellendus minima ullam
                </p>
                <h4 class="platillo-detalles_tipo">Tipo: <span>Aperitivo</span></h4>
                <h4 class="platillo-detalles_stock">Disponibilidad: <span>5</span></h4>
                <h4 class="platillo-detalles_precio">Precio: <span>$5</span></h4>
            </div>
        </article>
    </main>
    
</body>
</html>