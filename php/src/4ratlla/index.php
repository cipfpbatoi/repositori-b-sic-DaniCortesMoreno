<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>HTML</title>
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
        /* Cercle amb punts blancs */
        background-color: #000;
        /* Fons negre o pot ser un altre color */
        display: inline-block;
        margin: 10px;
        color: white;
        font-size: 2rem;
        text-align: center;
        vertical-align: middle;
    }

    .player1 {
        background-color: red;
        /* Color vermell per un dels jugadors */
    }

    .player2 {
        background-color: yellow;
        /* Color groc per l'altre jugador */
    }

    .buid {
        background-color: white;
        /* Color blanc per cercles buits */
        border-color: #000;
        /* Puntes negres per millor visibilitat */
    }
    </style>

</head>


<body>
    <?php
    include 'functions.php';
    $graella = inicilitzarGraella();
    $jugador = 2;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['columna'])) {
        
        $columna = htmlspecialchars($_POST['columna']);

            if ($jugador == 1) {
                ferMoviment($graella, $columna, $jugador);
                $jugador = 2;
            } 
            if ($jugador == 2) {
                ferMoviment($graella, $columna, $jugador);
                $jugador = 1;
            }
                
    } 

    pintarGraella($graella);

        ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="columna">Columna(0-6):</label>
        <input type="number" id="columna" name="columna" min="0" max="6" required>
        <button type="submit">Fer Moviment</button>
    </form>
</body>

</html>