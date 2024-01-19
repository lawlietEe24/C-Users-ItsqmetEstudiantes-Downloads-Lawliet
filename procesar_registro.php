<?php
$servername = "localhost";
$username = "root";
$password = "Itsqmet2";
$dbname = "bases";




$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];


$verificarCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultadoVerificacion = $conn->query($verificarCorreo);

if ($resultadoVerificacion->num_rows > 0) {
  
    echo "Este correo ya está registrado. Por favor, elige otro.";
} else {
   
    $sql = "INSERT INTO usuarios (nombres, apellidos, correo, contrasena) VALUES ('$nombres', '$apellidos', '$correo', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        
        echo "Registro exitoso";

        
        session_start();
        $_SESSION['usuario'] = $correo;

       
        header('Location: inicio.html');
        exit();
    } else {
        echo "Error en el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>