<?php
$conexion = mysqli_connect('localhost', 'root', '', 'appWeb');
//validacion de seguridad si el usuario esta en la variable global o si ya inicio sesion

?>


<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="resource/css/productos.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="naveg">
        <div class="heading">
            <h2 id="hh">PRODUCTOS</h2>
        </div>
    </div>
    <br>

    <table class="table2">
        <tr>
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Cantidad</td>

        </tr>

        <?php
        $sql = "SELECT * from productos";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
        ?>

            <tr>
                <td><?php echo $mostrar['IdProducto'] ?></td>
                <td><?php echo $mostrar['Nombre'] ?></td>
                <td><?php echo $mostrar['Precio'] ?></td>
                <td><?php echo $mostrar['Cantidad'] ?></td>

            </tr>
        <?php
        }
        ?>
    </table>
    <div class="regproducto">
        <h3>REGISTRAR PRODUCTO</h3>
        <div class="form">
            <form class="form_reg" action="controller/Products_Controller.php" method="POST">

                <p>Nombre: <input name="nombrePro" class="input" type="text" required autofocus></p>
                <p>Precio: <input name="precio" class="input" type="number" required autofocus></p>
                <p>Cantidad: <input name="cantidad" class="input" type="number" required autofocus></p>
                <button class="submit" type="submit"> Registrar </button>

            </form>
        </div>
    </div>
    <div class="regproducto2">
        <h3 id="disp">DISPONIBILIDAD</h3>
        <div class="form">
            <form class="form_reg" action="controller/Products_Controller.php" method="POST">

                <p>Codigo: <input name="codigo" class="input" type="number" required autofocus></p>
                <p>Cantidad: <input name="cant" class="input" type="number" required autofocus></p>

                <button class="submit" type="submit"> Ingresar </button>

            </form>
        </div>
    </div>

</body>

</html>