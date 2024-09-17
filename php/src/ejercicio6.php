<!DOCTYPE html>
<body>
    
<?php

$var = 9;
$result = match (true) {
     $var >=5 && $var <=7 => 'Be' ,
     $var >= 8 && $var <=9 => 'Molt be',
     $var == 10 => 'Excelent',
     default => 'insuficient'
};
echo $result;
?>

</body>
</html>

