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

function palabra($palabra) {
    return $palabra;
}

?>