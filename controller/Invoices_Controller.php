<?php
require_once "model/Conexion.php";

class Invoices_Controller{
    private $result;

    private function __construct(){}

    public static function Main($array,$option)
    {
        $invoice = new Invoices_Controller();
        switch($option){
            case 0: $this->result = $invoice->Consult($array); break;
            case 1: $this->result = $invoice->Insert($array); break;
            case 2: $this->result = $invoice->Update($array); break;
            case 3: $this->result = $invoice->Delete($array); break;
        }
        return $this->result;
    }

    public function Consult($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from facturas";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
    }

    public function Insert($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from detalleFacturas WHERE Correo = ? AND Contrasena = MD5(?) ";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss",$array[0],$array[1]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
    }
    public function Update($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from detalleFacturas WHERE Correo = ? AND Contrasena = MD5(?) ";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss",$array[0],$array[1]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
    }
    
    public function Delete($array)
    {
        $conexion = Conexion::connection();
        $sql = "SELECT * from detalleFacturas WHERE Correo = ? AND Contrasena = MD5(?) ";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss",$array[0],$array[1]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
    }
}
?>
