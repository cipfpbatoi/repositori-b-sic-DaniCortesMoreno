<html>
<body>
<?php

include_once "./helpers/funciones.php";

$resultat = sumar(5, 3);  // $resultat conté 8


$resultatDefecte = sumarDefecte(5);  // $resultat conté 8


// Assignació de valors
$x = 5;
$y = "Hola món";

// Operacions aritmètiques
$suma = $x + 10;
$producte = $x * 2;

// Concatenació de cadenes
$nom = "Joan";
$salutacio = $y . ", " . $nom;

// Impressió de resultats
echo $y.'<br/>';  // Hola món
echo $suma.'<br/>';  // 15
echo $producte.'<br/>';  // 10
echo $salutacio.'<br/>';  // Hola món, Joan
echo $resultat.'<br/>';
echo $resultatDefecte.'<br/>';
?>
</body>
</html>