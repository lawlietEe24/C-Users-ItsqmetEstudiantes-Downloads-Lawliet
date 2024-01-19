<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Itsqmet2";
$dbname = "bases";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$correo = $_POST['usuario'];
$contrasena = $_POST['password'];


$sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    $_SESSION['usuario'] = $correo;
    echo "Inicio de sesión exitoso para " . $correo;

  
    header('Location: Index.html');
    exit();
} else {
  
    echo "Correo o contraseña incorrectos";
}


$conn->close();
?>
