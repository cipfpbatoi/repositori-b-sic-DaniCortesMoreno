<?php
session_start();
include 'functions.php';

if (isset($_SESSION['user'])) {
    if (isset($_SESSION['historial'])) {
        array_push($_SESSION['historial'], "4Ratlla");
    }
} else {
    header("Location: /projecte3/login.php");
    exit();
}

// Reinicialitzar només si és la primera vegada o si es demana reiniciar explícitament
if (!isset($_SESSION['graella'])) {
    $_SESSION['graella'] = inicilitzarGraella();
    $_SESSION['jugador'] = 1;
    $_SESSION['fi_del_joc'] = false;
}

// Si es prem el botó de reiniciar, reiniciar la partida
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reiniciar']) && $_POST['reiniciar'] == '1') {
    $_SESSION['graella'] = inicilitzarGraella();
    $_SESSION['jugador'] = 1;
    $_SESSION['fi_del_joc'] = false;
}

// Comprovar si s'ha enviat un moviment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['columna']) && !$_SESSION['fi_del_joc']) {
    $columna = intval(htmlspecialchars($_POST['columna']));
    $jugador = $_SESSION['jugador'];

    // Realitzar el moviment per al jugador actual
    ferMoviment($_SESSION['graella'], $columna, $jugador);

    // Comprovar si el jugador actual ha guanyat
    if (esGuanyador($_SESSION['graella'], $jugador)) {
        echo "<p>Jugador $jugador ha guanyat!</p>";
        $_SESSION['fi_del_joc'] = true;
    } elseif (esTaulerPle($_SESSION['graella'])) {
        echo "<p>El joc ha acabat en empat!</p>";
        $_SESSION['fi_del_joc'] = true;
    } else {
        // Canviar el jugador si el joc continua
        $_SESSION['jugador'] = ($jugador == 1) ? 2 : 1;
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
        <button type="submit" <?php if ($_SESSION['fi_del_joc']) echo 'disabled'; ?>>Fer Moviment</button>
    </form>

    <!-- Añadir un botón para reiniciar la partida -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="reiniciar" value="1">
        <button type="submit">Reiniciar Partida</button>
    </form>

    <section>
        <ul>
            <li><a href="/projecte3/logout.php">Tancar sessió</a></li>
            <li><a href="/projecte3/login.php">Ir a la página de login</a></li>
        </ul>
    </section>

    <p>Welcome, <?= $_SESSION['user'] ?></p>

</body>
</html>
