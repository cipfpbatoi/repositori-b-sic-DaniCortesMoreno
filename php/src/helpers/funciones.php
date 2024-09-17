<?php

function sumar(int $a, int $b): int {
    return $a + $b;
}

function sumarDefecte(int $a, int $b = 12): int {
    return $a + $b;
}
