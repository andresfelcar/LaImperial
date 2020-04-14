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
                $result = $products->Insert();
                break;
            case 2:
                $result = $products->Update();
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
        $sql = "SELECT IdProducto,Nombre from Productos";
        return $conexion->query($sql);
    }

    public function Insert()
    {
        $nombre=$_POST['nombrePro'];
        $precio=$_POST['precio'];
        $cantidad=$_POST['cantidad'];



        //conexion
        $conexion = Conexion::connection();
        //consulta
        $sql = "INSERT INTO productos (Nombre,Precio,Cantidad) VALUES (?,?,?)";
        //preparamos la consulta
        $stmt = $conexion->prepare($sql);
        // añadimos los parametros ("tipo de dato s= string, i= entero, d=double",$Variables en su lugar correspondiente con los ?)
        $stmt->bind_param("sii", $nombre,$precio,$cantidad);
        //ejecutamos el stmt
        $stmt->execute();


        return $conexion->query($sql);
    }

    public function Update()
    {
        $codigo=$_POST['codigo'];
        $cantidad=$_POST['cant'];
       
        $conexion = Conexion::connection();
        $sql = "UPDATE prodcutos SET Cantidad =(SELECT Cantidad + '$cantidad') WHERE idProducto='$codigo'";
        return $conexion->query($sql);
        
    }

    public function Delete($array)
    {
    }
}
