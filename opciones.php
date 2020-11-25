<?php
    include('inc/templates/head.php');
?>

    <header class="header barra">
        <a href="index.php"><h1 class="title">Bus_Mel</h1></a>
        <?php include('inc/templates/nav.php'); ?>
    </header>

    <main class="main">
        <table id="list-contacts" class="table">
            <thead>
                <tr class="table-row head">
                    <th class="cell">Nombre</th>
                    <th class="cell">Descripcion</th>
                    <th class="cell">Options</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php
                    include("inc/funciones/consultas.php");
                    $resultado = obtenerPlatillos();
                    while($platillo = $resultado->fetch_assoc()){    ?>
                        <tr class="table-row">
                            <td class="cell"><?php echo $platillo['nombre']; ?></td>
                            <td class="cell"><?php echo $platillo['descripcion'] ?></td>
                            <td class="cell options">
                                <a href="form.php?id=<?php echo $platillo['id_platillo'] ?>">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <button class="eliminar" data-id="<?php echo $platillo['id_platillo'] ?>">
                                    <i class="fas fa-trash-alt icon-delete"></i>
                                </button>
                            </td>
                        </tr> 
                <?php } ?>
            </tbody>
        </table>
    </main>
    <script src="js/scripts.js?v=1"></script>

</body>
</html>