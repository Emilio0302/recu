 <form action="index.php?controlador=busqueda&accion=busca" method="post">
    <p>Buscar</p>
    <input type="text" name="nombre">
    <p>
        <input type="submit" value="Buscar">
    </p>
</form> 

<?php
$busqueda = $datosParaVista['datos'] ? $_POST['nombre'] : "";


if (!$datosParaVista['datos'] || $datosParaVista['datos'] === null) {
    echo "<p>No hay usuarios</p>";
} else {
    echo "<p>Has buscado por $busqueda</p>";
    foreach ($datosParaVista['datos'] as $usuario) {
        $nombre = $usuario->getNombre();
        echo "<p>$nombre</p>";
    }
}  