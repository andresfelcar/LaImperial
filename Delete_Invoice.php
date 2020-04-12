<?php
@session_start();
require_once "controller/Controller.php";

$resultado = $_SESSION['user'];
if ($resultado == null) {
    header("Location:Login.php");
}

if(!empty($_POST['id'])){
    $invoice =  new Controller();
    $array = array(
        0=>$_POST['id']
    );
    echo $array[0];
    $resultado = $invoice->Invoices(3,$array);
    return $resultado;
}
?>