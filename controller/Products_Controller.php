<?php
require_once "model/Conexion.php";

//$conexion = mysqli_connect('localhost', 'root', '', 'appWeb');

class Products_Controller
{

    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $products = new Products_Controller();
        switch ($option) {
            case 0:
                $result = $products->Consult();
                break;
            case 1:
                $result = $products->Insert($array);
                break;
            case 2:
                $result = $products->Update($array);
                break;
            case 3:
                $result = $products->Delete($array);
                break;
        }
        return $result;
    }

    public function Consult()
    {
        $conexion = Conexion::connection();
        $sql = "SELECT IdProducto,Nombre,Precio,Cantidad from productos";
        return $conexion->query($sql);
    }

    public function Insert($array)
    {


        //conexion
        $conexion = Conexion::connection();
        //consulta
        $sql = "INSERT INTO productos (Nombre,Precio,Cantidad) VALUES (?,?,?)";
        //preparamos la consulta
        $stmt = $conexion->prepare($sql);
        // añadimos los parametros ("tipo de dato s= string, i= entero, d=double",$Variables en su lugar correspondiente con los ?)
        $stmt->bind_param("sid", $array[0],$array[1],$array[2]);
        //ejecutamos el stmt
        $stmt->execute();


        return $conexion->query($sql);
    }

    public function Update($array)
    {

        $conexion = Conexion::connection();
        $sql = "UPDATE prodcutos SET Cantidad =(SELECT Cantidad + '$array[1]') WHERE idProducto='$array[0]'";
        $stmt = $conexion->prepare($sql);
        // añadimos los parametros ("tipo de dato s= string, i= entero, d=double",$Variables en su lugar correspondiente con los ?)
        $stmt->bind_param("ii", $array[1],$array[0]);
        //ejecutamos el stmt
        $stmt->execute();


        return $conexion->query($sql);
        
    }

    public function Delete($array)
    {
    }
}
