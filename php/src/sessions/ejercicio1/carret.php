<?php
session_start();
echo "Welcome, " . $_SESSION['user']."<br>";;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
    $productoAEliminar = $_POST['eliminar'];
    $index = array_search($productoAEliminar, $_SESSION['carrito']);
    if ($index !== false) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
    }
}

if(isset($_SESSION['carrito'])) {
    //unset($_SESSION['carrito']);
    $poma = [];
    $taronja = [];
    $platan =[];
    foreach($_SESSION['carrito'] as $producto) {
        if($producto == "Poma") {
            array_push($poma, $producto);
        } 
        if ($producto == "Taronja") {
            array_push($taronja, $producto);
        } 
        if ($producto == "Platan") {
            array_push($platan, $producto);
        }
        
    }
    if(in_array("Poma", $_SESSION['carrito'])) {
        echo "Poma: ".count($poma);
        echo "<form method='post' style='display:inline;'>
                <button type='submit' name='eliminar' value='Poma'>Eliminar una</button>
              </form><br>";
    } 
    if (in_array("Taronja", $_SESSION['carrito'])) {
        echo "Taronja: ".count($taronja);
        echo "<form method='post' style='display:inline;'>
                <button type='submit' name='eliminar' value='Taronja'>Eliminar una</button>
              </form><br>";
    } 
    if (in_array("Platan", $_SESSION['carrito'])) {
        echo "Plàtan: ".count($platan);
        echo "<form method='post' style='display:inline;'>
                <button type='submit' name='eliminar' value='Platan'>Eliminar una</button>
              </form><br>";
    }
} else {
    echo "No tienes nada en el carrito";
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carret</title>
    
</head>
<body>

    <br>
    <a href="ejercicio1.php">Volver atrás</a>
</body>
</html>