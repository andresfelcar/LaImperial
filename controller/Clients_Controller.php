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
                $result = $login->Insert();
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
        $sql = "SELECT IdCliente,Nombre1 from Clientes";
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