<?php
    include('inc/templates/head.php');
?>
    <header class="header barra">
        <a href="index.php"><h1 class="title">Bus_Mel</h1></a>
        <?php include('inc/templates/nav.php'); ?>
    </header>

    <main class="main">
        <form id="formulario" class="formulario">
            <h2>Registrar un nuevo platillo</h2>

            <div class="formulario-campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Nombre del platillo">
            </div>
            <div class="formulario-campo">
                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" placeholder="Precio del platillo" min="0" max="500">
            </div>
            <div class="formulario-campo">
                <label for="stock">Stock</label>
                <input type="text" name="stock" id="stock" placeholder="Stock del día" min="0" max="50">
            </div>
            <div class="formulario-campo">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo">
                    <option value="">--Seleccione el tipo de comida--</option>
                    <option value="2">Aperitivo</option>
                    <option value="3">Carne</option>
                    <option value="4">Pescado</option>
                    <option value="5">Postre</option>
                </select>
            </div>
            <div class="formulario-campo textarea">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" placeholder="Decripción del platillo"></textarea>
            </div>
            <div class="formulario-campo submit">
                <input type="hidden" id="accion" value="crear">
                <input class="btn" type="submit" value="Registrar platillo">
            </div>
        </form>
    </main>
    
    <script src="js/scripts.js"></script>
</body>
</html>