<?php
@session_start();
require_once "controller/Controller.php";
$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("location:Login.php");
}
if ($resultado[10] == 2) {
    header("location:View_Invoice.php");
}

if (!empty($_POST['nomb']) && !empty($_POST['apell'])) {
    $array = [];
   
    array_push($array, $_POST['nomb'], $_POST['apell'], $_POST['dni'], $_POST['cel'], $_POST['pass'], $_POST['email']);

$empleados =  new Controller();

$result = $empleados->Sellers(1, $array);
}



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
    <?php include('Menu.php'); ?>
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
            $emple = new Controller();
            $vendedores=$emple->Sellers(0);
            while ($mostrar = $vendedores->fetch_row()) {
            ?>

                <tr>
                    <td><?php echo $mostrar[0] ?></td>
                    <td><?php echo $mostrar[1] ?></td>
                    <td><?php echo $mostrar[2] ?></td>
                    <td><?php echo $mostrar[3] ?></td>
                    <td><?php echo $mostrar[4] ?></td>
                    <td><?php echo $mostrar[5] ?></td>
                    

                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="regemple">
        <h3>REGISTRAR </h3>
        <div class="form">
            <form class="form_reg" action="" method="POST">
                <p>Nombre: <input name="nomb" class="input" type="text" required autofocus></p>
                <p>Apellido: <input name="apell" class="input" type="text" required autofocus></p>
                <p>Documento: <input name="dni" class="input" type="number" required autofocus></p>
                <p>Celular: <input name="cel" class="input" type="number" required autofocus></p>
                <p>Correo: <input name="email" class="input" type="text" required autofocus></p>
                <p>Contraseña: <input name="pass" class="input" type="password" required autofocus></p>
                <button class="submit" type="submit"> Registrar </button>

            </form>
        </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="resource/js/invoice.js"></script>