<?php
    session_start();
    echo "Welcome, " . $_SESSION['user'];
    if (!empty($_SESSION['historial'])) {
        echo "<br>";
        echo "Paginas visitadas por el usuario: ";
        foreach($_SESSION['historial'] as $key){
            echo $key . ", ";
        }
    }
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="ejercicio1.php">Ir a la tienda del carrito</a><br>
    <a href="/ofegat/index.php">Ir al ofegat</a><br>
    <a href="/4ratlla/index.php">Ir al 4 en ratlla</a><br>
    <a href="logout.php">Tancar sessió</a>
</body>
</html>