<?php 
class conexion{
    
    function conectar(){
        try{
            $bd='php_factura';	
            $server='localhost';
            $user='root';
            $password='';
            return mysqli_connect($server,$user,$password,$bd);
        }
        catch(Exception $ex){
            return $ex;
        }
    }

    function conectarfactura(){
        try{
            $bd='php_factura';	
            $server='localhost';
            $user='root';
            $password='';
            return mysqli_connect($server,$user,$password,$bd);
        }
        catch(Exception $ex){
            return $ex;
        }
    }
 
}


    
?>