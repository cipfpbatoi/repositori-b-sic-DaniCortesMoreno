<html>
<body>

<?php
    echo "Los numeros pares son: ";
    echo "<br/>Con FOR<br/>";
    for ($i=0; $i < 20; $i++) { 
        if ($i % 2 == 0) {
            echo $i." ";
        }
    }

    echo "<br/>Con WHILE<br/>";
    $a = 20;
    while ($a >= 0) {
        if ($a % 2 == 0) {
            echo $a." ";
        }
        $a--;
    }


?>

</body>
</html>