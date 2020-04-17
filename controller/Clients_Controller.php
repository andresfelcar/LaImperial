<?php
class Clients_Controller{
    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $login = new Clients_Controller();
        switch ($option) {
            case 0:
                $result = $login->Consult($array);
                break;
            case 1:
                $result = $login->Insert($array);
                break;
            case 2:
                $result = $login->Update($array);
                break;
            case 3:
                $result = $login->Delete($array);
                break;
        }
        return $result;
    }

    public function Consult($array)
    {
        if($array==null){  
            $conexion = Conexion::connection();
            $sql = "SELECT IdCliente,Nombre1,Telefono,Celular,Correo,Direccion from Clientes";
            return $conexion->query($sql);
        }
        $conexion = Conexion::connection();
            $sql = "SELECT IdCliente,Nombre1,Telefono,Celular,Correo,Direccion from Clientes WHERE IdCliente='$array'";
            return $conexion->query($sql);
       }

    public function Insert($array)
    {
        $conexion = Conexion::connection();
        
        $sql = "INSERT INTO clientes (Nombre1,Telefono,Celular,Correo,Direccion) VALUES (?,?,?,?,?)";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("sssss", $array[0],$array[1],$array[2],$array[3],$array[4]);
        
        $stmt->execute();
    }
    
    public function Update($array)
    {
        $conexion = Conexion::connection();
        
        $sql = "UPDATE clientes SET Nombre1=?,Telefono=?,Celular=?,Correo=?,Direccion=? WHERE IdCliente=? ";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("sssssi",$array[1],$array[2],$array[3],$array[4],$array[5],$array[0]);
        
        $stmt->execute();
    }

    public function Delete($array)
    {
        $conexion = Conexion::connection();
        
        $sql = "DELETE FROM clientes WHERE idCliente=? ";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("i",$array[0]);
        
        $stmt->execute();

    }
}
?>