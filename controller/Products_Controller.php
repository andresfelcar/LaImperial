<?php
require_once "model/Conexion.php";

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

    }

    public function Update()
    {
        
    }

    public function Delete($array)
    {
    }
}
