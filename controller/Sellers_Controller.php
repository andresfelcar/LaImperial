<?php
require_once "model/Conexion.php";

class Sellers_Controller{
    private function __construct(){}

    public static function Main($option,$array=[])
    {
        $seller = new Sellers_Controller();
        switch($option){
            case 0: $result = $seller->Consult(); break;
            case 1: $result = $seller->Insert(); break;
            case 2: $result = $seller->Update(); break;
            case 3: $result = $seller->Delete(); break;
        }
        return $result;
    }     

    public function Consult()
    {
        $conexion = Conexion::connection();
        $sql = "SELECT Nombre1,Apellido1,FechaIngreso,Ventas from Usuarios";
        return $conexion->query($sql);
    }

    public function Insert()
    {
    }
    public function Update()
    {
    }
    
    public function Delete()
    {
    }
}

?>