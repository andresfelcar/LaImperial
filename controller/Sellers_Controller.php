<?php
require_once "model/Conexion.php";

class Sellers_Controller
{
    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $seller = new Sellers_Controller();
        switch ($option) {
            case 0:
                $result = $seller->Consult($array);
                break;
            case 1:
                $result = $seller->Insert($array);
                break;
            case 2:
                $result = $seller->Update();
                break;
            case 3:
                $result = $seller->Delete($array);
                break;
        }
        return $result;
    }

    public function Consult($array)
    {
        $conexion = Conexion::connection();
        if ($array == null) {
            $sql = "SELECT IdUsuario,Nombre1,Apellido1,NDocumento,Celular,Correo,Contrasena,FechaIngreso,Ventas from Usuarios";
            return $conexion->query($sql);
        }
        $sql = "SELECT * from Usuarios WHERE IdUsuario='$array'";
        return $conexion->query($sql);

    }

    public function Insert($array)
    {
        $conexion = Conexion::connection();
        date_default_timezone_set('America/Bogota');

        $fecha = date('Y-m-d h:i:s', time());


        $sql = "INSERT INTO usuarios (Nombre1,Apellido1,NDocumento,Celular,Contrasena,Correo,FechaIngreso) VALUES (?,?,?,?,MD5(?),?,'$fecha')";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("ssssss", $array[0], $array[1], $array[2], $array[3], $array[4], $array[5]);

        $stmt->execute();
    }
    public function Update()
    {
    }

    public function Delete($array)
    {
        $conexion = Conexion::connection();

        $sql = "DELETE FROM usuarios WHERE IdUsuario=? ";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("i", $array[0]);

        $stmt->execute();
    }
}
