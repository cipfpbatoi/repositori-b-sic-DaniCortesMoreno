<?php
session_start();
include_once 'functions.php';
//Para comprobar el usuario
if (!isset($_SESSION['user'])) {
    header("Location: /projecte3/login.php");
    exit();
}

$_SESSION['paraula'] = "exemple";
$cantidadLetras = strlen($_SESSION['paraula']);
$finalitzat = false;


//Con este trozo de codigo consigo que se guarde las letras que hay introducido en el array de la palabra.
//Verifica que si no existe el array de guiones lo crea solo una vez. Si no pongo esto cada vez que le de a enviar a la letra
//Se vuelve a crear el array de nuevo.
if (!isset($_SESSION['arrayGuiones'])) {
    $_SESSION['arrayGuiones'] = array_fill(0, $cantidadLetras, '_');
}
if (!isset($_SESSION['errores'])) {
    $_SESSION['errores'] = 0;
}
//Formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['reiniciar'])) {
        unset($_SESSION['arrayGuiones']);
        unset($_SESSION['errores']);
        header("Location: /ofegat/index.php");
        exit();
    }
    $letra = htmlspecialchars($_POST['letra']);
    if (!empty($_POST['letra']) && strlen($letra) == 1) {

        if (comprobadorIntent($_SESSION['paraula'], $letra, $_SESSION['arrayGuiones']) == false) {
            echo "<p class='incorrect'>No existe la letra $letra</p>";
            $_SESSION['errores']++;
        }

    } else {
        echo "<p>Coloca una letra</p>";
    }
}
if (comprobarFinPartida($_SESSION['arrayGuiones'], $_SESSION['errores']) == 1) {
    ?>
<h1>Ha terminado el juego</h1>
<p>Has ganado!</p>
<?php
$finalitzat = true;
}
if (comprobarFinPartida($_SESSION['arrayGuiones'], $_SESSION['errores']) == 2) {
    ?>
<h1>Ha terminado el juego</h1>
<p>Has perdido!</p>
<?php
$finalitzat = true;
}
// Solo mostramos la palabra y los errores si el juego no ha terminado
if (!$finalitzat) {
    mostrarArrayCorrecto($_SESSION['arrayGuiones']);
    if ($_SESSION['errores'] > 0) {
        echo "Tienes un total de: " . $_SESSION['errores'] . " errores";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>HTML</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .correct {
        color: green;
    }

    .incorrect {
        color: red;
    }
    </style>

</head>


<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="letra">Letra:</label>
        <input type="text" id="letra" name="letra"><br>
        <input type="submit" value="Enviar" name="Enviar">
    </form>

    <form action="" method="post">
        <input type="submit" value="reiniciar" name="reiniciar">

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