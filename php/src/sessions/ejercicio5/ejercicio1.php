<?php
    session_start();
    //Primero comprueba que haya alguien loggeado antes de entrar al ejercicio del carrito, si no hay nadie te redirige a login.php.
    if(isset($_SESSION['user'])) {
        echo "Welcome, " . $_SESSION['user'];
        if (isset($_SESSION['historial'])) {
            array_push($_SESSION['historial'], "Carrito");
        }
        if(isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }
        if (isset($_POST['producte'])) {
            $carrito[] = $_POST['producte'];
            $_SESSION['carrito'] = $carrito;
        }
    } else {
        header("Location: login.php");
        exit();
    }
    
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Selecció de productes</title>
</head>

<body>
    <h1>Afegir productes al carret</h1>
    <form action="" method="POST">
        <label for="producte">Tria un producte:</label>
        <select name="producte" id="producte">
            <option value="Poma">Poma</option>
            <option value="Platan">Plàtan</option>
            <option value="Taronja">Taronja</option>
        </select>
        <input type="submit" value="Afegir al carret">
    </form>
    <a href="carret.php">Veure carret</a>
    <a href="logout.php">Tancar sessió</a>
    <a href="bienvenida.php">Ir a la página de bienvenida</a><br>
</body>

</html>