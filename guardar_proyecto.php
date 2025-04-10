<?php
$conn = new mysqli('database-1.cps8e4w8ky9c.us-east-2.rds.amazonaws.com', 'admin', 'studentconnect_bd', 'studentconnect_bd');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['proj_name'];
    $descripcion = $_POST['proj_desc'];

    $sql = "INSERT INTO proyectos (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Proyecto creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: crear_proyecto.html");
exit();
?>