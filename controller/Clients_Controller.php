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
                $result = $login->Update();
                break;
            case 3:
                $result = $login->Delete();
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
    
    public function Update()
    {
    }

    public function Delete()
    {
    }
}
?>