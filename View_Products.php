<?php
@session_start();
require_once "controller/Controller.php";
//validacion admin
$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("location:Login.php");
}
if ($resultado[9] == 2) {
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
if(!empty($_POST['codigor'])) {

    //creamos array
    $array = [];
    //agregamos datos al array  array_push(nombre_del_array,Variable1,varable2,variables...);
    array_push($array, $_POST['codigor']);
//objeto para acceder al sellers
$product =  new Controller();

$result = $product->Products(3,$array);
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link href="resource/css/productos2.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="naveg">
        <div class="heading">
            <h2 id="hh">PRODUCTOS</h2>
        </div>
        
    </div>

    <div class="regproducto" id="regproducto">
        <form class="form_reg" action="" method="POST">
            <h3>REGISTRAR PRODUCTO</h3>
            <p>Nombre: <input name="nombrePro" class="input" type="text" required autofocus></p>
            <p>Precio: <input name="precio" class="input" type="number" required autofocus></p>
            <p>Cantidad: <input name="cantidad" class="input" type="number" required autofocus></p>
            <button class="submit" type="submit"> Registrar </button>

        </form>
    </div>
    <div class="regproducto2" id="regproducto2">
        <form class="form_reg" action="" method="POST">
            <h3>ELIMINAR</h3>
            <p>Codigo: <input name="codigor" class="input" type="number" required autofocus></p>
            
            <button class="submit" type="submit"> Eliminar </button>
        </form>
    </div>


    <div class="tabla">
        <div class="inclu"><?php include('Menu.php'); ?></div>
        <table id="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
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
                        <td><a href="Edit_Producto.php?update_id=<?php echo $mostrar[0] ?>" title="Editar Producto">
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

    

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="resource/js/invoice.js"></script>
    <script src="resource/js/produ.js"></script>
</html>
