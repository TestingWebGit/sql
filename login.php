<?php
$servername = "localhost";
$username = "root";
$password = "";  // Cambia esto por tu contraseña de MySQL si es necesario
$dbname = "testdb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Consulta SQL vulnerable a inyección SQL
$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login exitoso. Bienvenido, " . $user;
} else {
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>
