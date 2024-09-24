<html>
<body>

<?php

function arrayFunction($array = []) {
    $total = 0;
    foreach ($array as $numero) {
        $total = $total + $numero;
    }

    $mitjana = $total / count($array);
    return $mitjana;

    //return array_sum($numeros) / count($numeros);
}

echo "La mitjana es: ".arrayFunction($array = [1,3,7,10,15]);
?>

</body>
</html>
