<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .correct { color: green; }
        .incorrect { color: red; }
    </style>

</head>


<body>
    <?php
    include_once 'functions.php';

    $palabra = "exemple"; 

    $cantidadLetras = strlen($palabra);
    $arrayGuiones = array_fill(0, $cantidadLetras, '_');
    


    //Formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $letra = htmlspecialchars($_POST['letra']);

        if (!empty($_POST['letra']) && strlen($letra) == 1) {
            
            if (comprobadorIntent($palabra, $letra, $arrayGuiones) == false) {
                echo "<p class='incorrect'>No existe la letra $letra</p>";
            } 

        } else {
            echo "<p>Coloca una letra</p>";
        }
    } 

    mostrarArrayCorrecto($arrayGuiones);
        ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="letra">Letra:</label>
        <input type="text" id="letra" name="letra"><br>
        <input type="submit" value="Enviar" name="Enviar">
    </form>

</body>

</html>