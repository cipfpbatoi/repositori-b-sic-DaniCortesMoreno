<?php
// Recuperamos la información de la sesión
session_start();
session_unset();
// Y la destruimos
session_destroy();

if (isset($_COOKIE['user'])) {
    setcookie('user',"",1);
}
header("Location: /projecte3/login.php");
exit();
?>