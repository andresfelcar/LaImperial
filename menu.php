<?php
@session_start();
$resultado = $_SESSION['user'];
if ($resultado == null) {
	header("Location:Login.php");
}

?>
<!--validacion de inicio de sesion-->
<ul class="nav navbar-nav">
	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Factura
			<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="View_Invoice.php">Lista de Facturas</a></li>
			<li><a href="Create_Invoice.php">Crear Factura</a></li>
			<?php 
			if($resultado[10]==1){
				echo '<li><a href="View_Sellers.php">Vendedores</a></li>';
				echo '<li><a href="View_Products.php">Productos</a></li>';
			}
			?>
		</ul>
	</li>
	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Conectado: <?php echo $resultado[1]; ?>
			<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#">Mi Cuenta</a></li>
			<li><a href="action.php?action=logout">Salir</a></li>
		</ul>
	</li>
</ul>
<br /><br /><br /><br />