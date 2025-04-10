<?php
$conn = new mysqli('database-1.cps8e4w8ky9c.us-east-2.rds.amazonaws.com', 'admin', 'studentconnect_bd', 'studentconnect_bd');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $career = $_POST['career'];
    $semester = $_POST['semester'];
    $skills = $_POST['skills'];

    $sql = "INSERT INTO alumnos (username, email, password, career, semester, skills) VALUES ('$username', '$email', '$password', '$career', '$semester', '$skills')";

    if ($conn->query($sql) === TRUE) {
        echo "Alumno registrado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: signupalumnos.html");
exit();
?>