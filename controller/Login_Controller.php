<?php
require_once "model/Conexion.php";

class Login_Controller
{
    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $login = new Login_Controller();
        switch ($option) {
            case 0:
                $result = $login->Consult($array);
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

    public function Consult($array)
    {
        $conexion = Conexion::connection();

        $sql = "SELECT * from Usuarios WHERE Correo = ? AND Contrasena = MD5(?) ";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("ss", $array[0], $array[1]);

        $stmt->execute();
        
        $result = $stmt->get_result();
        return $result->fetch_row();
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
