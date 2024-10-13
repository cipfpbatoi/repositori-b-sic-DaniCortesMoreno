<?php
function inicilitzarGraella() {
    $graella = array_fill(0, 6, array_fill(0, 7, 0));
    return $graella;
}

function pintarGraella($graella) {
    echo '<table>';
    foreach ($graella as $fila) {
        echo '<tr>';
        foreach ($fila as $celda) {
            $classe = match ($celda) {
                  0 =>  'buid',
                  1 =>   'player1',
                  2 =>  'player2' ,
            };
            
            echo '<td class="'.$classe.'"></td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function ferMoviment(&$graella, $columna, $jugadorActual) {
    for ($i = count($graella) - 1; $i >= 0; $i--) {
        if ($graella[$i][$columna] == 0) {
            $graella[$i][$columna] = $jugadorActual;
            break;
        }
    }
}

function esGuanyador($graella, $jugador) {
    $files = count($graella);
    $columnes = count($graella[0]);

    // Comprovar horitzontals
    for ($i = 0; $i < $files; $i++) {
        for ($j = 0; $j < $columnes - 3; $j++) {
            if ($graella[$i][$j] == $jugador && $graella[$i][$j + 1] == $jugador &&
                $graella[$i][$j + 2] == $jugador && $graella[$i][$j + 3] == $jugador) {
                return true;
            }
        }
    }

    // Comprovar verticals
    for ($i = 0; $i < $files - 3; $i++) {
        for ($j = 0; $j < $columnes; $j++) {
            if ($graella[$i][$j] == $jugador && $graella[$i + 1][$j] == $jugador &&
                $graella[$i + 2][$j] == $jugador && $graella[$i + 3][$j] == $jugador) {
                return true;
            }
        }
    }

    // Comprovar diagonals ascendents
    for ($i = 3; $i < $files; $i++) {
        for ($j = 0; $j < $columnes - 3; $j++) {
            if ($graella[$i][$j] == $jugador && $graella[$i - 1][$j + 1] == $jugador &&
                $graella[$i - 2][$j + 2] == $jugador && $graella[$i - 3][$j + 3] == $jugador) {
                return true;
            }
        }
    }

    // Comprovar diagonals descendents
    for ($i = 0; $i < $files - 3; $i++) {
        for ($j = 0; $j < $columnes - 3; $j++) {
            if ($graella[$i][$j] == $jugador && $graella[$i + 1][$j + 1] == $jugador &&
                $graella[$i + 2][$j + 2] == $jugador && $graella[$i + 3][$j + 3] == $jugador) {
                return true;
            }
        }
    }

    return false;
}

function esTaulerPle($graella) {
    foreach ($graella as $fila) {
        if (in_array(0, $fila)) {
            return false;
        }
    }
    return true;
}
?>
