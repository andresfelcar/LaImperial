<?php
require_once "model/Conexion.php";

class Sellers_Controller{
    private $result;

    private function __construct(){}

    public static function Main($array,$option)
    {
        $seller = new Login_Controller();
        switch($option){
            case 0: $this->result = $seller->Consult(); break;
            case 1: $this->result = $seller->Insert(); break;
            case 2: $this->result = $seller->Update(); break;
            case 3: $this->result = $seller->Delete(); break;
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