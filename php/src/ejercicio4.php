<html>
<body>

<?php

$text = 'Hola soy Dani';

function contarNumeroVocals($text) {
    $arrayVocals = ['a','e','i','o','u'];
    $totalVocales = 0;
    for ($i=0; $i < strlen($text); $i++) { 
        if (in_array($text[$i], $arrayVocals)) {
            $totalVocales++;
        }
    } 

    //substr_count
    return $totalVocales;
}


echo contarNumeroVocals($text);

?>

</body>
</html>
