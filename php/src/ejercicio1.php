<html>
<body>
<?php

$x = 5;
$y = 3;
function sumar($a, $b) {
    return $a + $b;
}

$suma = sumar($x,$y);

function restar($a, $b) {
    return $a - $b;
}

$resta = restar($x,$y);

function multiplicar($a, $b) {
    return $a * $b;
}

$mult = multiplicar($x,$y);
echo "Los valores son ".$x." y ".$y."<br/>";
echo "La suma es ".$suma."<br/>";
echo "La resta es ".$resta."<br/>";
echo "La mult es ".$mult."<br/>";

if ($suma == 8 && $resta == 2) {
    echo "True";
} else {
    echo "False";
}


?>

</body>
</html>

