<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari de Contacte</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           echo "<h2>Porfavor pon bien el email</h2>";
        } elseif(empty($name)) {
            echo "<h2>Porfavor pon un nombre</h2>";
        } elseif((empty($password) || empty($confirmPassword)) || $password != $confirmPassword) {
            echo "<h2>Porfavor introduce bien las 2 contraseñas y que sean igual</h2>";
        } else {
            echo "<h2>Gràcies per contactar-nos!</h2>";
            echo "<p>El teu nom es: $name</p>";
            echo "<p>El teu correu electrònic: $email</p>";
            echo "<p>El teu password es: $password</p>";
        }
    } else {
        ?>
        <h2>Formulari de Contacte</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Nombre:</label> 
            <input type="text" id="name" name="name"><br><br>
            <label for="name">Password:</label> 
            <input type="password" id="password" name="password"><br><br>         
            <label for="name">Confirma tu Password:</label> 
            <input type="password" id="confirmPassword" name="confirmPassword"><br><br>            
            <label for="email">Correu electrònic:</label>
            <input type="text" id="email" name="email"><br><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }
    ?>
</body>
</html>
