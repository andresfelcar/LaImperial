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

if (!empty($_POST['deletven'])) {
    $array = [];

    array_push($array, $_POST['deletven']);

    $empleados =  new Controller();

    $result = $empleados->Sellers(3, $array);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Productos</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="resource/css/empleados2.css" rel="stylesheet">
        <link href="resource/css/style.css" rel="stylesheet">
       

    </head>
    <title>Empleados</title>
</head>

<body>
    <div class="naveg">
        <div class="heading">
            <h2 id="hh">VENDEDORES</h2>
        </div>
    </div>
    <div class="regemple">
            <form class="form_reg" action="" method="POST">
                <h3>REGISTRAR</h3>
                <p>Nombre: <input name="nomb"  type="text" required autofocus></p>
                <p>Apellido: <input name="apell"  type="text" required autofocus></p>
                <p>Documento: <input name="dni"  type="text" required autofocus></p>
                <p>Celular: <input name="cel"  type="text" required autofocus></p>
                <p>Correo: <input name="email"  type="text" id="min" required autofocus></p>
                <p>Contraseña: <input name="pass"  type="password" required autofocus></p>
                <button type="submit"> Registrar </button>
            </form>
        </div>
    <div class="regemple2">
            <form class="form_reg" action="" method="POST">
                <h3>ELIMINAR</h3>
                <p>Codigo: <input name="deletven"  type="text" required autofocus></p>
                <button type="submit"> Eliminar </button>
            </form>
    </div>
    <div class="tabla">
        <div class="inclu"><?php include('Menu.php'); ?></div>
        <table id="table">
            <thead>
                <tr>

                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $emple = new Controller();
                $vendedores = $emple->Sellers(0);
                while ($mostrar = $vendedores->fetch_row()) {
                ?>

                    <tr>

                        <td><p><?php echo $mostrar[0] ?></p></td>
                        <td><p><?php echo $mostrar[1] ?></p></td>
                        <td><p><?php echo $mostrar[2] ?></p></td>
                        <td><p><?php echo $mostrar[3] ?></p></td>
                        <td><p><?php echo $mostrar[4] ?></p></td>
                        <td><p class="overflow"><?php echo $mostrar[5] ?></p></td>
                        <td><p class="overflow"><?php echo $mostrar[6] ?></p></td>
                        <td><a href="Edit_Empleado.php?update_id=<?php echo $mostrar[0] ?>" title="Editar Factura">
                                <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                            </a></td>

                    </tr>
                <?php
                }
                ?>

            </tbody>

        </div>
    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="resource/js/invoice.js"></script>
<script src="resource/js/input.js"></script>
</html>
