<?php

function mostrarArray($array) {
    foreach ($array as $value) {
        echo $value . ' ';
    }
}

function comprobadorIntent($palabra, $letraIntroducida, &$arrayLetrasAdivinar) {
    $palabra = strtolower($palabra);
    $letraIntroducida = strtolower($letraIntroducida);
    $encontrada = false;
        for ($i=0; $i < strlen($palabra); $i++) { 
            if ($palabra[$i] == $letraIntroducida) {
                $arrayLetrasAdivinar[$i] = $letraIntroducida;
                $encontrada = true;
            }
        }

    return $encontrada;
}

function mostrarArrayCorrecto(&$arrayGuiones) {
    echo "<p>";
    foreach ($arrayGuiones as $letra) {
        if ($letra != '_') {
            echo "<span class='correct'>$letra</span>"; // Para la letra acertada en verde
        } else {
            echo "<span class='guion'>_</span>"; // El guion para letra no acertada
        }
    }
    echo "</p>";
}

function comprobarFinPartida($arrayGuiones, $numErrores) {
    $guiones = 0;
    foreach ($arrayGuiones as $letra) {
        if ($letra == '_') {
            $guiones++;
        }
    }

    if ($numErrores == 5) {
        return 2;
    } 
    if ($guiones == 0) {
        return 1;
    }
}

?>