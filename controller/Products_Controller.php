<?php
require_once "model/Conexion.php";

class Products_Controller{
    private $result;

    private function __construct(){}

    public static function Main($array,$option)
    {
        $products = new Login_Controller();
        switch($option){
            case 0: $this->result = $products->Consult(); break;
            case 1: $this->result = $products->Insert(); break;
            case 2: $this->result = $products->Update(); break;
            case 3: $this->result = $products->Delete(); break;
        }
        return $this->result;
    }

    public function Consult()
    {
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