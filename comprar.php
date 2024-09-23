<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'tienda_virtual';
$username = 'root';
$password = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Obtener registros de compras
function obtenerCompras($pdo) {
    $sql = 'SELECT c.id_compra, c.id_producto, c.cantidad, c.fecha_compra, p.nombre FROM compras c JOIN productos p ON c.id_producto = p.id_producto';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$compras = obtenerCompras($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compras</title>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon"> <!-- Añadir favicon -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            position: relative;
        }
        h1 {
            text-align: center;
            color: #FF6347;
            font-size: 2.5em;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #FF6347;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #FF6347;
            color: white;
        }
        .volver {
            position: absolute;
            top: 10px;
            left: 20px;
            padding: 10px 20px;
            background-color: #FF6347;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .volver:hover {
            background-color: #FF4500;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <a href="index.php" class="volver">Volver a la tienda</a>
    <h1>Registro de Compras</h1>
    <table>
        <tr>
            <th>ID Compra</th>
            <th>ID Producto</th>
            <th>Nombre Producto</th>
            <th>Cantidad</th>
            <th>Fecha de Compra</th>
        </tr>
        <?php foreach ($compras as $compra): ?>
            <tr>
                <td><?php echo $compra['id_compra']; ?></td>
                <td><?php echo $compra['id_producto']; ?></td>
                <td><?php echo $compra['nombre']; ?></td>
                <td><?php echo $compra['cantidad']; ?></td>
                <td><?php echo $compra['fecha_compra']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
