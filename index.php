<?php
    include('inc/templates/head.php');
?>
    <div class="header-contenedor">
        <header class="header">
            <h1 class="title">Bus_Mel</h1>
            <?php include('inc/templates/nav.php'); ?>
        </header>
    </div>

    <?php
        include("inc/funciones/consultas.php");
        $resultado = obtenerPlatillos();
        var_dump($resultado->fetch_assoc());
    ?>
    <section class="platillos">
        <h2>Platillos</h2>
        <div class="platillos-contenedor">
            
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            <article class="platillo">
                <a href="platillo.php">
                    <h3 class="platillo-nombre">Mole poblano</h3>
                    <figure class="platillo-contenedor-imagen">
                        <img src="images/platillo1.jpg" alt="imagen-platillo">
                    </figure>
                </a>
            </article>
            
        </div>
    </section>
    
</body>
</html>