<?php
include('conexion_model.php');
class login{ 
    
    function logueo (){
        try {
           $nombre=$_POST['nombre'];
           $apellido=$_POST['apellido'];
           $contraseña=$_POST['contra'];
           $correo=$_POST['correo'];
           $direccion=$_POST['direc'];                                                    
           $telefono=$_POST['telefono'];
           
           $object = new conexion();
           $conexion = $object->conectar();
           
           $sql ="insert into factura_usuarios (email,password,first_name,last_name,mobile,address) values ('$correo','$contraseña','$nombre','$apellido','$telefono','$direccion')";
          
           mysqli_query($conexion,$sql);
           

        } catch(Exception $ex){
            return $ex;
        }
    }

    function productos (){
        try {

           $nombreproducto=$_POST['producto'];
           $preciounidad=$_POST['precioU'];
           $preciodecena=$_POST['precioD'];
           $cantidad=$_POST['cantidad'];

           $object = new conexion();
           $conexion = $object->conectar();
           
          
           $sql3 = "insert into productos (nombreproducto,preciounidad,preciodocena,cantidad) values ('$nombreproducto','$preciounidad','$preciodecena','$cantidad')";
         
            mysqli_query($conexion,$sql3);
           

        } catch(Exception $ex){
            return $ex;
        }
    }

    function disponible(){
        try {
          $idproducto=$_POST['idproducto'];
           $cantidadproducto=$_POST['cantidadproducto']; 
           $cantidadproducto=(int) $cantidadproducto;
           
           
           
           $object = new conexion();
           $conexion = $object->conectar();
           
           
           $sql4 ="update productos set cantidad=(SELECT cantidad+'$cantidadproducto') where id='$idproducto'";
          
           mysqli_query($conexion,$sql4);
           
           

        } catch(Exception $ex){
            return $ex;
        }
    }


    function ingreso(){
        try {
          $user=$_POST['user'];
           $contra=$_POST['contra']; 
           
           
           
           
           $object = new conexion();
           $conexion = $object->conectar();
           
            $sql5 ="SELECT * FROM usuarios WHERE usuario ='$user' and  contraseña ='$contra'";
            $resultado=mysqli_query($conexion,$sql5);
           $resultado1= mysqli_fetch_row($resultado);
            if($resultado1==true){
                echo "Bienvenido:".$user;
                header('Location: ../administrador.php');
            } 
            if ($resultado1==false){
                header('Location: ../ingreso.php');
               return;
            }
        } catch(Exception $ex){
            return $ex;
        }
    }

    function egreso(){
        try {
          
           $code=$_POST['item_code[]']; 
           
           
           
           
           $object = new conexion();
           $conexion = $object->conectar();
           
           $sql8 ="update productos set cantidad=(SELECT cantidad - SELECT order_item_quantity FROM factura_orden_producto ) where id='$code'";
            
           mysqli_query($conexion,$sql8);
           
          
        } catch(Exception $ex){
            return $ex;
        }
    }
    
}
//creamos el objeto
$object = new login();
  

if(empty($_POST['notes'])){
    $object->egreso();
    header('Location: ../administrador.php');
}

if(!empty($_POST['nombre'])){
    $object->logueo();
    header('Location: ../administrador.php');
}

if(!empty($_POST['producto'])){
    $object->productos();
    header('Location: ../administrador.php');
    
}
if(!empty($_POST['idproducto'])){
    $object->disponible();
    header('Location: ../administrador.php');
}
if(!empty($_POST['user'])){
$object->ingreso();
}

?>

