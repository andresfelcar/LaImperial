<?php
class Conexion{

    private function __construct(){}

    public static function connection(){
        return mysqli_connect("localhost", "root", "", "appWeb");
    }  
}
    
?>