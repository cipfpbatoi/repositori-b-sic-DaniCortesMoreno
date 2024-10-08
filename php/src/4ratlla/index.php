<?php
session_start();
    if(isset($_SESSION['user'])) {
        echo "Welcome, " . $_SESSION['user'];
        if (isset($_SESSION['historial'])) {
            array_push($_SESSION['historial'], "4Ratlla");
        }
        
    } else {
        header("Location: /sessions/ejercicio5/login.php");
        exit();
    }
include 'functions.php';

// Reinicialitzar la sessió si és una sol·licitud GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['graella'] = inicilitzarGraella();
    $_SESSION['jugador'] = 1;
}

// Comprovar si s'ha enviat un moviment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['columna'])) {
    $columna = intval(htmlspecialchars($_POST['columna']));
    $jugador = $_SESSION['jugador'];

    // Realitzar el moviment per al jugador actual
    ferMoviment($_SESSION['graella'], $columna, $jugador);

    // Canviar el jugador
    if ($jugador == 1) {
        $_SESSION['jugador'] = 2;
    } else {
        $_SESSION['jugador'] = 1;
    }
}

// Pintar la graella
$graella = $_SESSION['graella'];
pintarGraella($graella);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>4 en Ratlla</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    table {
        border-collapse: collapse;
    }

    td {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 10px dotted #fff;
        background-color: #000;
        display: inline-block;
        margin: 10px;
        color: white;
        font-size: 2rem;
        text-align: center;
        vertical-align: middle;
    }

    .player1 {
        background-color: red;
    }

    .player2 {
        background-color: yellow;
    }

    .buid {
        background-color: white;
        border-color: #000;
    }
    </style>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="columna">Columna (0-6):</label>
        <input type="number" id="columna" name="columna" min="0" max="6" required>
        <button type="submit">Fer Moviment</button>
        <a href="logout.php">Tancar sessió</a>
        <a href="/sessions/ejercicio5/bienvenida.php">Ir a la página de bienvenida</a><br>
    </form>
</body>

</html>
