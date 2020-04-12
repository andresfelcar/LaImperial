<?php
require_once "Invoices_Controller.php";
require_once "Login_Controller.php";
require_once "Products_Controller.php";
require_once "Sellers_Controller.php";

class Controller{

    public function Login($array,$option){
        return Login_Controller::Main($array,$option);
    }

    public function Products($array,$option){
        return Products_Controller::Main($array,$option);
    }

    public function Invoices($array,$option){
        return Invoices_Controller::Main($array,$option);
    }

    public function Sellers($array,$option){
        return Sellers_Controller::Main($array,$option);
    }
}
?>