<?php
$conn = new mysqli('database-1.cps8e4w8ky9c.us-east-2.rds.amazonaws.com', 'admin', 'studentconnect_bd', 'studentconnect_bd');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa_name = $_POST['empresa_name'];
    $representante_name = $_POST['representante_name'];
    $correo_empresa = $_POST['correo_empresa'];
    $telefono_empresa = $_POST['telefono_empresa'];

    $sql = "INSERT INTO empresas (empresa_name, representante_name, correo_empresa, telefono_empresa) VALUES ('$empresa_name', '$representante_name', '$correo_empresa', '$telefono_empresa')";

    if ($conn->query($sql) === TRUE) {
        echo "Empresa registrada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: signupempresas.html");
exit();
?>