<?php
// Iniciar sessió
session_start();

// Emmagatzemar informació de l'usuari en la sessió
$_SESSION['nom'] = 'Dani';
$_SESSION['rol'] = 'Administrador';

echo 'Benvingut, ' . $_SESSION['nom'] . '<br>';
echo 'Rol: ' . $_SESSION['rol'] . '<br>';
?>