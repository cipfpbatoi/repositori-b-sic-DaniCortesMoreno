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
            $classe = '';
            switch ($celda) {
                case 0:
                    $classe = 'buid';
                    break;
                case 1:
                    $classe = 'player1';
                    break;
                case 2:
                    $classe = 'player2';
                    break;
            }
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

?>