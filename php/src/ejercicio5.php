<html>
<body>

    <?php
        
        $tablaMultiplicar = [];
        $numeros1Al10 = [1,2,3,4,5,6,7,8,9,10];
        
        for ($i=1; $i <= 5; $i++) { 
            for ($j=1; $j < count($numeros1Al10); $j++) { 
                $tablaMultiplicar[$i][$j] = $i * $j;
            }
        }

        
        for ($i=1; $i <= 5; $i++) { 
            for ($j=1; $j <= count($tablaMultiplicar); $j++) { 
                echo $i."x".$j." = <strong>".$tablaMultiplicar[$i][$j]."</strong> ";
            }
            echo "<br>"; 
        }
        
    ?>

</hmtl>
</body>