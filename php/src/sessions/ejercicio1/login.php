<?php
if(isset($_COOKIE['user'])) {
    // Si la cookie existeix, iniciar sessió automàticament
    session_start();
    $_SESSION['user'] = $_COOKIE['user'];
    header("Location: bienvenida.php");
    exit();
}

// Llista d'usuaris predefinits amb contrasenyes en text pla
$users = [
    'user1@example.com' => '1234',
    'user2@example.com' => '1234',
];

// Convertir les contrasenyes a un format encriptat
foreach ($users as $email => $password) {
    $users[$email] = password_hash($password, PASSWORD_BCRYPT);
}

// Formulari d'autenticació
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($users[$email]) && password_verify($password, $users[$email])) {
        // L'usuari està autenticat
        session_start();
        $_SESSION['user'] = $email;

        if (isset($_POST['recordam'])) {
            setcookie(
                'user', // Nom de la cookie
                $email, // Valor a guardar
                [
                    'expires' => time() + 3600, // tiempo de vida de la cookie
                    'domain' => '', // Domini actual
                    'secure' => true, // Només HTTPS
                    'httponly' => true, // Només accessible via HTTP
                    'samesite' => 'Lax' // o 'Strict' o 'None'
                ]
            );
        }
        
        header("Location: bienvenida.php");
        exit();
        echo "Login successful. Welcome, " . $email;
        
    } else {
        // Credencials incorrectes
        echo "Invalid email or password.";
    }
}
?>
<form method="post">
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <input type="checkbox" id="recordam" name="recordam">Recordam</input>
    <button type="submit" name="login">Login</button>
</form>