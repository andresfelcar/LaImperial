<?php
@session_start();
require_once "controller/Controller.php";
//validacion admin
$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("location:Login.php");
}
if ($resultado[10] == 2) {
    header("location:View_Invoice.php");
}

//validacion de el post definido
if (!empty($_POST['nombrePro']) && !empty($_POST['precio'])) {

    //creamos array
    $array = [];
    //agregamos datos al array  array_push(nombre_del_array,Variable1,varable2,variables...);
    array_push($array, $_POST['nombrePro'], $_POST['precio'], $_POST['cantidad'],);
//objeto para acceder al sellers
$productos =  new Controller();

$result = $productos->Products(1, $array);
}
//validacion segundo form
if(!empty($_POST['codigo']) && !empty($_POST['cant'])) {

    //creamos array
    $array = [];
    //agregamos datos al array  array_push(nombre_del_array,Variable1,varable2,variables...);
    array_push($array, $_POST['codigo'], $_POST['cant']);
//objeto para acceder al sellers
$product =  new Controller();

$result = $product->Products(2,$array);
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="resource/css/productos1.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="naveg">
        <div class="heading">
            <h2 id="hh">PRODUCTOS</h2>
            <nav class="inclu"><?php include('Menu.php'); ?></nav>
        </div>
        
    </div>
    

    <table class="table2">
        
        <tr>
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Cantidad</td>

        </tr>

        <?php
            $pro = new Controller();
            $productos=$pro->Products(0);
            while ($mostrar = $productos->fetch_row()) {
            ?>

            <tr>
                <td><?php echo $mostrar[0] ?></td>
                <td><?php echo $mostrar[1] ?></td>
                <td><?php echo $mostrar[2] ?></td>
                <td><?php echo $mostrar[3] ?></td>

            </tr>
        <?php
        }
        ?>
    </table>
    <div class="regproducto">
        <h3>REGISTRAR PRODUCTO</h3>
        <div class="form">
            <form class="form_reg" action="" method="POST">

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
            <form class="form_reg" action="" method="POST">

                <p>Codigo: <input name="codigo" class="input" type="number" required autofocus></p>
                <p>Cantidad: <input name="cant" class="input" type="number" required autofocus></p>

                <button class="submit" type="submit"> Ingresar </button>

            </form>
        </div>
    </div>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="resource/js/invoice.js"></script>