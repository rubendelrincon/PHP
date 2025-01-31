<?php
include 'conexionbd.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
} else {
    echo "ID de usuario no válido.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $plan_base = $_POST['plan_base'];
    $duracion = $_POST['duracion'];
    $paquetes = isset($_POST['paquete']) ? $_POST['paquete'] : [];

    // Actualizar los datos del usuario
    $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, edad = ?, plan_base = ?, duracion = ? WHERE id = ?");
    $stmt->bind_param("sssissi", $nombre, $apellido, $email, $edad, $plan_base, $duracion, $id_usuario);

    if ($stmt->execute()) {
        // Actualizar los paquetes del usuario
        $stmt = $conn->prepare("DELETE FROM paquetes_usuarios WHERE usuario_id = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();

        foreach ($paquetes as $paquete) {
            $stmt = $conn->prepare("INSERT INTO paquetes_usuarios (usuario_id, paquete) VALUES (?, ?)");
            $stmt->bind_param("is", $id_usuario, $paquete);
            $stmt->execute();
        }

        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario - StreamWeb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Editar Usuario</h1>

        <form id="registroForm" method="post" action="">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo $usuario['edad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="plan_base">Plan Base</label>
                <select class="form-control" id="plan_base" name="plan_base" required>
                    <option value="Basico" <?php if($usuario['plan_base'] == "Basico") echo "selected"; ?>>Básico</option>
                    <option value="Estandar" <?php if($usuario['plan_base'] == "Estandar") echo "selected"; ?>>Estándar</option>
                    <option value="Premium" <?php if($usuario['plan_base'] == "Premium") echo "selected"; ?>>Premium</option>
                </select>
            </div>
            <div class="form-group">
                <label for="duracion">Duración</label>
                <select class="form-control" id="duracion" name="duracion" required>
                    <option value="Mensual" <?php if($usuario['duracion'] == "Mensual") echo "selected"; ?>>Mensual</option>
                    <option value="Anual" <?php if($usuario['duracion'] == "Anual") echo "selected"; ?>>Anual</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"></label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="paquete[]" value="Deporte" id="deporte">
                    <label class="form-check-label" for="deporte">Deporte</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="paquete[]" value="Cine" id="cine">
                    <label class="form-check-label" for="cine">Cine</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="paquete[]" value="Infantil" id="infantil">
                    <label class="form-check-label" for="infantil">Infantil</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <!-- Incluir el archivo de validación JavaScript -->
    <script src="validaciones.js" defer></script>
    
</body>
</html>
