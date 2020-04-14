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
        if ($array == null) {
            $conexion = Conexion::connection();
            $sql = "Select fa.IdFactura,fa.Fecha,cl.Nombre1, fa.Total from facturas fa INNER JOIN clientes cl INNER JOIN usuarios us where fa.IdCliente = cl.IdCliente and fa.IdUsuario= us.IdUsuario ";
            return $conexion->query($sql);
        }
        $conexion = Conexion::connection();
        $id = $array;

        $result1 = $conexion->query("Select fa.IdFactura,fa.Fecha,fa.Total,cl.Nombre1,cl.Direccion  from facturas fa INNER JOIN clientes cl where fa.IdCliente=cl.IdCliente AND fa.IdFactura='$id'");
        $result2 = $conexion->query("Select pr.IdProducto, pr.Nombre,de.Cantidad, pr.Precio  from detallefacturas de INNER JOIN productos pr where de.IdProducto=pr.IdProducto and de.IdFactura='$id'");

        $array = [];
        array_push($array, $result1, $result2);
        return  $array;
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
        $conexion = Conexion::connection();
        $date = null;
        $stmt = $conexion->prepare("UPDATE facturas SET IdCliente = ?, Total= ? WHERE IdFactura=?");
        $stmt->bind_param("idi", $array['companyName'], $array['subTotal'], $array['invoiceId']);
        $stmt->execute();
       
        $object = new Invoices_Controller();
        
    
        for ($i = 0; $i < count($array['productCode']); $i++) {
            $vector=[];
            array_push($vector,$conexion,$array['invoiceId'],$array['productCode'][$i],$array['quantity'][$i]);
            $id=$object->Consult_id($vector);
            
            $stmt = $conexion->prepare("UPDATE detallefacturas SET IdProducto=?, Cantidad=? WHERE IdDFactura=?");
            $stmt->bind_param("iii",$array['productCode'][$i], $array['quantity'][$i],$id[0]);
            $stmt->execute();
        }
        return $stmt;
    }
    public function Consult_id($vector){
        $sql ="SELECT IdDFactura FROM detallefacturas WHERE IdFactura = ? AND IdProducto= ? AND Cantidad= ?";
        $stmt = $vector[0]->prepare($sql);
        $stmt->bind_param("iii", $vector[1],$vector[2],$vector[3]);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_row();
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
