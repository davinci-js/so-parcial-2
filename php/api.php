<?php
    // Reporte de errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header("Content-Type: application/json");

    // Reemplazar por la IP del servidor
    $servername = "";
    // Usuario para acceder a MySQL
    $username = "";
    // Clave para acceder a MySQL
    $password = "";
    // Nombre de la base de datos a usar
    $dbname = "davinci";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
    }

    // Consulta SQL
    $sql = "SELECT * FROM alumnos";
    // Hace la consulta
    $result = $conn->query($sql);
    // Verifica si hay resultado
    if ($result) {
        // Si hay, devuelve como JSON
        if ($result->num_rows > 0) {
            $data = [];
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            // Sino, devuelvo Array vacio
            echo json_encode([]);
        }
    } else {
        echo json_encode(["error" => "Query fallida: " . $conn->error]);
    }

    $conn->close();
?>
