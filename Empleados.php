<?php
$conexion = mysqli_connect('localhost', 'root', '', 'appWeb');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="resource/css/empleado.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">

</head>
    <title>Empleados</title>
</head>
<body>
<div class="naveg">
        <div class="heading">
            <h2 id="hh">EMPLEADOS</h2>
        </div>
    </div>
    <br>
<div class="tabla">
    <table class="table2">
        <tr>
            	
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Documento</td>
            <td>Celular</td>
            <td>Correo</td>
            <td>Contraseña</td>

        </tr>

        <?php
        $sql = "SELECT * from usuarios";
        $result = mysqli_query($conexion, $sql);

        while ($mostrar = mysqli_fetch_array($result)) {
        ?>

            <tr>
                <td><?php echo $mostrar['Nombre1'] ?></td>
                <td><?php echo $mostrar['Apellido1'] ?></td>
                <td><?php echo $mostrar['NDocumento'] ?></td>
                <td><?php echo $mostrar['Celular'] ?></td>
                <td><?php echo $mostrar['Correo'] ?></td>
                <td><?php echo $mostrar['Contrasena'] ?></td>

            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    <div class="regemple">
        <h3>REGISTRAR </h3>
        <div class="form">
            <form class="form_reg" action="controller/Products_Controller.php" method="POST">

                <p>Nombre: <input name="nomb" class="input" type="text" required autofocus></p>
                <p>Apellido: <input name="apell" class="input" type="number" required autofocus></p>
                <p>Documento: <input name="dni" class="input" type="number" required autofocus></p>
                <p>Celular: <input name="cel" class="input" type="text" required autofocus></p>
                <p>Correo: <input name="email" class="input" type="number" required autofocus></p>
                <p>Contraseña: <input name="pass" class="input" type="number" required autofocus></p>
                <button class="submit" type="submit"> Registrar </button>

            </form>
        </div>
</body>
</html>