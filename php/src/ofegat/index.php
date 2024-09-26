<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include_once 'functions.php';

    $palabra = "exemple"; 

    $cantidadLetras = strlen($palabra);
    $arrayGuiones = array_fill(0, $cantidadLetras, '_');

    //Más tarde, en la letra tengo que poner con el formulario, la letra que introduzca
    if (comprobadorIntent($palabra, "e", $arrayGuiones) == false) {
        echo "No existe";
    } else {
        echo "Existe";
    }

    //Para mostrar el array de guiones.
    mostrarArray($arrayGuiones);

    
    
    ?>

</body>

</html>