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
                $result = $login->Consult();
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

    public function Consult()
    {
        $conexion = Conexion::connection();
        $sql = "SELECT IdCliente,Nombre1,Telefono,Celular,Correo,Direccion from Clientes";
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
        
        $sql = "UPDATE clientes SET Nombre1=?,Apellido1=?,NDocumento=?,Celular=?,Contrasena=?,Correo=? WHERE IdUsuario=? ";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("i",$array[1],$array[2],$array[3],$array[4],$array[5],$array[6],$array[0]);
        
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