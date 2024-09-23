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

// Obtener productos de camisas
function obtenerProductos($pdo, $categoria) {
    $sql = 'SELECT * FROM productos WHERE categoria = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$categoria]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$camisas = obtenerProductos($pdo, 'camisas');

// Registrar una compra
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $fecha_compra = date('Y-m-d H:i:s');

    $sql = 'INSERT INTO compras (id_producto, cantidad, fecha_compra) VALUES (?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_producto, $cantidad, $fecha_compra]);

    echo "<p style='color: green; text-align: center;'>Compra realizada con éxito.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camisas</title>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon"> <!-- Añadir favicon -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('imagenes/fondocamisas.jpg'); /* Aquí se agrega el fondo */
            background-size: cover; /* Ajustar el fondo para cubrir toda la página */
            background-position: center; /* Centrar la imagen de fondo */
            color: #333;
            position: relative;
        }
        h1 {
            text-align: center;
            color: #FF6347;
            font-size: 2.5em;
            margin-top: 10px; /* Ajustado para subir un poco más el título */
        }
        .volver {
            position: absolute;
            top: 10px; /* Ajusta según sea necesario */
            left: 20px; /* Ajusta según sea necesario */
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
        .productos {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 5px; /* Reducido para elevar más el contenedor de productos */
        }
        .producto {
            background-color: white;
            border: 2px solid #FF6347;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        img {
            max-width: 100%; /* Ajustar imagen al ancho del contenedor */
            height: auto; /* Mantener proporción de la imagen */
            border-radius: 5px; /* Bordes redondeados para la imagen */
        }
        button {
            background-color: #FF6347;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #FF4500;
        }
    </style>
</head>
<body>
    <a href="index.php" class="volver">Volver a la tienda</a>
    <h1>CAMISAS</h1>
    <div class="productos">
        <?php foreach ($camisas as $producto): ?>
            <div class="producto">
                <img src="imagenes/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                <h2><?php echo $producto['nombre']; ?></h2>
                <p>$<?php echo $producto['precio']; ?></p>
                <p><?php echo $producto['descripcion']; ?></p>
                <form method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" min="1" max="<?php echo $producto['stock']; ?>" required>
                    <button type="submit">Comprar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
