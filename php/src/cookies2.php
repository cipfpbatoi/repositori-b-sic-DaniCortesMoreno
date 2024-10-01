<?php
//Para accedir a la cookie
// Llegir el valor de la cookie
if (isset($_COOKIE['nom_usuari'])) {
    $nomUsuari = $_COOKIE['nom_usuari'];
     // Modificar el valor de la cookie
    $salutacio = 'Hola, ' . $nomUsuari;
    setcookie('nom_usuari', $salutacio, time() + 3600, '/');
    echo 'Hola, ' . $nomUsuari;

   
} else {
    echo 'Cookie not found.';
}
?>