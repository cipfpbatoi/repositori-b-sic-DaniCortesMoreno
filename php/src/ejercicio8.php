<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error {
            color: red;
        }
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<?php
// Arrays per als valors del mòdul i l'estat
$moduls = ["DAW", "DAM", "ASIX"];
$estats = ["completat" => "Completat", "comenzado" => "Comenzat", "noEmp" => "No començat"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module = $_POST['module'][0];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $pages = $_POST['pages'];
    $status = $_POST['status'][0];
    $comments = $_POST['comments'];
    
    // Mostrar resultats en una taula
    echo "<h2>Resultat:</h2>";
    echo "<table>
            <tr><th>Mòdul</th><td>$module</td></tr>
            <tr><th>Editorial</th><td>$publisher</td></tr>
            <tr><th>Preu</th><td>$price</td></tr>
            <tr><th>Pàgines</th><td>$pages</td></tr>
            <tr><th>Estat</th><td>{$estats[$status]}</td></tr>
            <tr><th>Comentaris</th><td>$comments</td></tr>
          </table>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module[]" multiple="false">
            <?php
            // Opcions del mòdul
            foreach ($moduls as $modul) {
                echo "<option value='$modul'>$modul</option>";
            }
            ?>
        </select>
        <span class="error"><!-- Missatge d'error per al mòdul aquí --></span>
    </div>
    <div>
        <label for="publisher">Editorial:</label>
        <input type="text" id="publisher" name="publisher" value="">
        <span class="error"><!-- Missatge d'error per a l'editorial aquí --></span>
    </div>
    <div>
        <label for="price">Preu:</label>
        <input type="text" id="price" name="price" value="">
        <span class="error"><!-- Missatge d'error per al preu aquí --></span>
    </div>
    <div>
        <label for="pages">Pàgines:</label>
        <input type="text" id="pages" name="pages" value="">
        <span class="error"><!-- Missatge d'error per a les pàgines aquí --></span>
    </div>
    <div>
        <label for="status">Estat:</label>
        <?php
        // Opcions de l'estat
        foreach ($estats as $key => $value) {
            echo "<input type='radio' name='status[]' value='$key'/> $value<br />";
        }
        ?>
        <span class="error"><!-- Missatge d'error per a l'estat aquí --></span>
    </div>
    <div>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo">
    </div>
    <div>
        <label for="comments">Comentaris:</label>
        <textarea id="comments" name="comments"></textarea>
    </div>
    <div>
        <button type="submit">Donar d'alta</button>
    </div>
</form>
</body>
</html>
