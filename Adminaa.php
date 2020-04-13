<?php
@session_start();
require_once "controller/Controller.php";

$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("Location:Login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="resource/css/admin.css">
</head>

<body>
    <div class="header">
        <div id="a">
            <a href="#" id="show1">Registrar Producto</a>
            <a href="#" id="show2">Registrar Vendedor</a>
            <a href="#" id="show3">Ingresar Disponibilidad</a>
            <a href="View_Invoice.php">Facturas</a>
            <a href="index.html">Cerrar Sesion</a>
        </div>
    </div>
    <div class="section">
        <div id="tablas">
            <div class="divicion4" id="producto">
                <h2>PRODUCTOS</h2>
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'imperial');
                ?>
                <table>
                    <tr>
                        <td>codigo</td>
                        <td>producto</td>
                        <td>precio unitario</td>
                        <td>precio docena</td>
                        <td>cantidad</td>
                    </tr>
                    <?php
                    $sql = "SELECT * from productos";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['nombreproducto'] ?></td>
                            <td><?php echo $mostrar['preciounidad'] ?></td>
                            <td><?php echo $mostrar['preciodocena'] ?></td>
                            <td><?php echo $mostrar['cantidad'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="divicion4" id="vendedor">
                <h2>Vendedores de rosas</h2>
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'imperial');
                ?>
                <table>
                    <tr>
                        <td>id</td>
                        <td>nombre</td>
                        <td>apellido</td>
                        <td>cedula</td>
                        <td>telefono</td>
                    </tr>
                    <?php
                    $sql = "SELECT * from empleados";
                    $result = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['apellido'] ?></td>
                            <td><?php echo $mostrar['cedula'] ?></td>
                            <td><?php echo $mostrar['telefono'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="section2">
            <div class="divicion1" id="div1">
                <h3>Registrar Trabajador</h3>
                <form class="form_reg" action="model/registro_model.php" method="POST">
                    <input class="products" name="nombre" type="text" placeholder="Nombre">
                    <input class="products" name="apellido" type="text" placeholder="Apellido">
                    <input class="products" name="direc" type="text" placeholder="Direccion">
                    <input class="products" name="telefono" type="text" placeholder="Telefono">
                    <input class="products" name="correo" type="text" placeholder="&#128100;Correo">
                    <input class="products" name="contra" type="password" placeholder="&#128274;Crear Contrase">
                    <button class="submit" type="submit"> Registrar </button>
                </form>
            </div>
            <div class="divicion2" id="div2">
                <h3>Registrar Producto</h3>
                <form class="form_reg" action="model/registro_model.php" method="POST">
                    <input class="products" name="producto" type="text" placeholder="Nombre del Producto">
                    <input class="products" name="precioU" type="text" placeholder="Precio del Producto">
                    <input class="products" name="precioD" type="text" placeholder="Precio Docena">
                    <input class="products" name="cantidad" type="text" placeholder="Cantidad">
                    <button class="submit" type="submit"> Ingresar </button>
                </form>
            </div>
            <div class="divicion3" id="div3">
                <h3>Ingresar Disponibilidad</h3>
                <form class="form_reg" action="model/registro_model.php" method="POST">
                    <input class="products" name="idproducto" type="text" placeholder="ingrese el codigo">
                    <input class="products" name="cantidadproducto" type="number" placeholder="ingrese la cantidad">
                    <button class="submit" type="submit"> Ingresar </button>
                </form>
            </div>
        </div>
    </div>
    <script src="resource/js/jquery.js"></script>
</body>
</html>