<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('cine.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .btn {
            text-decoration: none;
            color: white;
            background-color: red;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    include 'conexionbd.php';

    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Edad</th><th>Plan Base</th><th>Duración</th><th>Acciones</th></tr></thead><tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nombre"] . "</td>
                    <td>" . $row["apellido"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["edad"] . "</td>
                    <td>" . $row["plan_base"] . "</td>
                    <td>" . $row["duracion"] . "</td>
                    <td><a href='eliminar_usuario.php?id=" . $row["id"] . "' class='btn btn-danger'>Eliminar</a></td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No se encontraron usuarios registrados.";
    }

    $conn->close();
    ?>
</body>
</html>

