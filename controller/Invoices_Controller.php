<?php
require_once "model/Conexion.php";

class Invoices_Controller
{
    private function __construct()
    {
    }

    public static function Main($option, $array = [])
    {
        $invoice = new Invoices_Controller();
        switch ($option) {
            case 0:
                $result = $invoice->Consult($array);
                break;
            case 1:
                $result = $invoice->Insert($array);
                break;
            case 2:
                $result = $invoice->Update($array);
                break;
            case 3:
                $result = $invoice->Delete($array);
                break;
        }
        return $result;
    }

    public function Consult($array)
    {
        if ($array==null) {
            $conexion = Conexion::connection();
            $sql = "Select fa.IdFactura,fa.Fecha,cl.Nombre1, fa.Total from facturas fa INNER JOIN clientes cl INNER JOIN usuarios us where fa.IdCliente = cl.IdCliente and fa.IdUsuario= us.IdUsuario ";
            return $conexion->query($sql);
        }
        $conexion = Conexion::connection();
        $sql = "SELECT * from facturas where IdFactura= 7";
        return $conexion->query($sql);
    }

    public function Insert($array)
    {
        $conexion = Conexion::connection();
        $date = null;
        $stmt = $conexion->prepare("INSERT INTO Facturas(IdCliente,Fecha,IdUsuario,Total) VALUES(?,null,?,?)");
        $stmt->bind_param("iid", $array['companyName'], $array['userId'], $array['subTotal']);
        $stmt->execute();
        $id = $conexion->query("SELECT @@identity AS IdFactura");
        $id = $id->fetch_row();

        for ($i = 0; $i < count($array['productCode']); $i++) {
            $stmt = $conexion->prepare("INSERT INTO detalleFacturas(IdFactura,IdProducto,Cantidad) VALUES (?,?,?)");
            $stmt->bind_param("iii", $id[0], $array['productCode'][$i], $array['quantity'][$i]);
            $stmt->execute();
        }
        return $stmt;
    }

    public function Update($array)
    {
    }

    public function Delete($array, $count = 0)
    {
        $conexion = Conexion::connection();
        $sql = "DELETE from detallefacturas WHERE IdFactura = ? ";
        if ($count == 1) {
            $sql = "DELETE from facturas WHERE IdFactura = ? ";
        }
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $array[0]);
        $stmt->execute();

        if ($count == 0) {
            ++$count;
            $object = new Invoices_Controller();
            $object->Delete($array, $count);
        }
        return $stmt;
    }
}
