<?php
@session_start();
require_once "controller/Controller.php";

$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("Location:Login.php");
}
//validacion de el post definido
if (!empty($_POST['nomcli']) && !empty($_POST['emailcli'])) {

    //creamos array
    $array = [];
    //agregamos datos al array  array_push(nombre_del_array,Variable1,varable2,variables...);
    array_push($array, $_POST['nomcli'], $_POST['tel'], $_POST['cel'], $_POST['emailcli'], $_POST['direc']);
    //objeto para acceder al sellers
    $clientes =  new Controller();

    $result = $clientes->Clients(1, $array);
}
if (!empty($_POST['code'])) {

    //creamos array
    $array = [];
    //agregamos datos al array  array_push(nombre_del_array,Variable1,varable2,variables...);
    array_push($array, $_POST['code']);
    //objeto para acceder al sellers
    $deletecli =  new Controller();

    $result = $deletecli->Clients(3, $array);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
    
    <link href="resource/css/style.css" rel="stylesheet">
    <link href="resource/css/clientes2.css" rel="stylesheet">

</head>

<body>
<div class="naveg">
        <div class="heading">
            <h2 id="hh">Clientes</h2>
        </div>
    </div>

    <div class="regemple" id="regemple">
        <form class="form_reg" action="" method="POST">
            <h3>REGISTRAR </h3>
            <p>Cliente: <input name="nomcli" class="input" type="text" required autofocus></p>
            <p>Telefono: <input name="tel" class="input" type="text" required autofocus></p>
            <p>Celular: <input name="cel" class="input" type="number" required autofocus></p>
            <p>Correo: <input name="emailcli" class="input" type="text" required autofocus></p>
            <p>Direccion: <input name="direc" class="input" type="text" required autofocus></p>

            <button class="button1" type="submit"> Registrar </button>

        </form>
    </div>

    <div class="regemple2" id="regemple2">
        <form class="form_reg" action="" method="POST">
            <h3>ELIMINAR </h3>
            <p>Codigo: <input name="code" class="input" type="text" required autofocus></p>
            <button class="button1" type="submit"> Eliminar </button>

        </form>
    </div>


    <div class="tabla">
        <div class="inclu"><?php include('Menu.php'); ?></div>
        <table id="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $emple = new Controller();
                    $vendedores = $emple->Clients(0);
                    while ($mostrar = $vendedores->fetch_row()) {
                ?>

                    <tr>

                        <td><?php echo $mostrar[0] ?></td>
                        <td><?php echo $mostrar[1] ?></td>
                        <td><?php echo $mostrar[2] ?></td>
                        <td><?php echo $mostrar[3] ?></td>
                        <td><?php echo $mostrar[4] ?></td>
                        <td><?php echo $mostrar[5] ?></td>
                        <td><a href="Edit_Clientes.php?update_id=<?php echo $mostrar[0] ?>" title="Editar Factura">
                                <div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div>
                            </a></td>

                    </tr>
                <?php
                }
                ?>

            </tbody>
            </table>
        </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="resource/js/invoice.js"></script>
    
</body>

</html>