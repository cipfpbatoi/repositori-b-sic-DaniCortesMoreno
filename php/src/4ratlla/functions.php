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
?>
