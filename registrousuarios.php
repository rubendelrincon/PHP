<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
</head>
<body>
<?php
include 'C:\xampp\htdocs\programacion\HitoProgramacion\conexionbd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $plan_base = $_POST['plan_base'];
    $duracion = $_POST['duracion'];
    $paquetes = isset($_POST['paquete']) ? $_POST['paquete'] : [];


  

    // Insertar usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, edad, plan_base, duracion) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $nombre, $apellido, $email, $edad, $plan_base, $duracion);
    
    if ($stmt->execute()) {
        $id_usuario = $stmt->insert_id;
        $stmt->close();
        
        // Insertar paquetes adicionales
        foreach ($paquetes as $paquete) {
            $stmt = $conn->prepare("INSERT INTO paquetes_usuarios (usuario_id, paquete) VALUES (?, ?)");
            $stmt->bind_param("is", $id_usuario, $paquete);
            $stmt->execute();
            $stmt->close();
        }
        
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error en el registro: " . $conn->error;
    }
    
    $conn->close();
}
?>

</body>
<script src="validaciones.js" defer></script>"
</html>
