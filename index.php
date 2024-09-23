<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&Y Sport Mode</title>
    <link rel="icon" href="imagenes/favicon.ico" type="image/x-icon"> <!-- Añadir favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('imagenes/fondo-ropa.jpg');
            background-size: cover;
            color: #333;
            text-align: center;
            padding: 20px 20px;
            margin: 0;
        }
        footer {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 0px;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            box-shadow: 0 -5px 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            color: #FF6347;
            font-size: 2.5em;
            margin-top: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        h2 {
            color: white;
            font-size: 2em;
            margin: 30px 0;
        }
        .menu-desplegable {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .menu-icon {
            background-color: #FF6347;
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5em;
            transition: background-color 0.3s;
        }
        .menu-icon:hover {
            background-color: #e94d32;
        }
        .menu-desplegable-content {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: white;
            min-width: 200px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }
        .menu-desplegable-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .menu-desplegable-content a:hover {
            background-color: #f1f1f1;
        }
        .menu-desplegable:hover .menu-desplegable-content {
            display: block;
        }
        .categorias {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .categoria {
            text-align: center;
            position: relative;
        }
        .boton-imagen {
            display: block;
            width: 250px; /* Aumentar ancho */
            height: 250px; /* Aumentar altura */
            background-size: cover;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .boton-imagen:hover {
            transform: scale(1.1); /* Aumentar zoom al pasar el mouse */
            box-shadow: 0 4px 15px rgba(255, 99, 71, 0.5);
        }
        .categoria p {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .redes {
            margin-top: 10px;
        }
        .redes a {
            color: #FF6347;
            margin: 0 10px;
            font-size: 1.5em;
            text-decoration: none;
        }
        .carrusel {
            position: relative;
            max-width: 800px; /* Aumentar ancho del carrusel */
            margin: 20px auto;
            overflow: hidden;
            border-radius: 10px;
        }
        .imagenes {
            display: none;
            width: 100%;
            height: 400px; /* Aumentar altura de las imágenes */
            background-size: cover;
            border-radius: 10px;
        }
        .active {
            display: block;
        }
        .boton-navegacion {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 10px;
            z-index: 10;
        }
        .boton-navegacion.left {
            left: 10px;
        }
        .boton-navegacion.right {
            right: 10px;
        }
    </style>
</head>
<body>
    <h1>Tienda Virtual D&Y Sport Mode</h1>

    <!-- Menú desplegable -->
    <div class="menu-desplegable">
        <div class="menu-icon"><i class="fas fa-bars"></i></div>
        <div class="menu-desplegable-content">
            <a href="camisas.php"><i class="fas fa-tshirt"></i> Camisas</a>
            <a href="pantalones.php"><i class="fas fa-socks"></i> Pantalones</a>
            <a href="chaquetas.php"><i class="fas fa-vest"></i> Chaquetas</a>
            <a href="compras.php"><i class="fas fa-shopping-cart"></i> Compras</a>
        </div>
    </div>

    <h2>Viste tu mejor versión</h2>

    <!-- Carrusel de imágenes -->
    <div class="carrusel">
        <div class="imagenes active" style="background-image: url('imagenes/imagen1.jpg');">
            <a href="" style="display: block; height: 100%; width: 100%;"></a>
        </div>
        <div class="imagenes" style="background-image: url('imagenes/imagen2.jpg');">
            <a href="" style="display: block; height: 100%; width: 100%;"></a>
        </div>
        <div class="imagenes" style="background-image: url('imagenes/imagen3.jpg');">
            <a href="" style="display: block; height: 100%; width: 100%;"></a>
        </div>
        <button class="boton-navegacion left" onclick="cambiarImagen(-1)">&#10094;</button>
        <button class="boton-navegacion right" onclick="cambiarImagen(1)">&#10095;</button>
    </div>

    <!-- Categorías -->
    <h2>CATEGORÍAS</h2>
    <div class="categorias">
        <div class="categoria">
            <a href="camisas.php" class="boton-imagen" style="background-image: url('imagenes/camisa.jpg');" title="Camisas"></a>
            <p>Camisas</p>
        </div>
        
        <div class="categoria">
            <a href="pantalones.php" class="boton-imagen" style="background-image: url('imagenes/pantalon.jpg');" title="Pantalones"></a>
            <p>Pantalones</p>
        </div>
        
        <div class="categoria">
            <a href="chaquetas.php" class="boton-imagen" style="background-image: url('imagenes/chaqueta.jpg');" title="Chaquetas"></a>
            <p>Chaquetas</p>
        </div>
    </div>
    <br>
    <br>
    <br>

    <footer>
        <div class="redes">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
        <div>
            <p>&copy; 2024 D&Y Sport Mode. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        let index = 0;
        const imagenes = document.querySelectorAll('.imagenes');

        function mostrarImagen() {
            imagenes.forEach((img, i) => {
                img.classList.remove('active');
            });
            imagenes[index].classList.add('active');
        }

        function cambiarImagen(direction) {
            index = (index + direction + imagenes.length) % imagenes.length;
            mostrarImagen();
        }

        setInterval(() => cambiarImagen(1), 5000); // Cambia de imagen cada 5 segundos
    </script>
</body>
</html>
