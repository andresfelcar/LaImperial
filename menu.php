<?php
@session_start();
$resultado = $_SESSION['user'];
?>
<!--validacion de inicio de sesion-->
<ul class="nav navbar-nav">
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Factura
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="invoice_list.php">Lista de Facturas</a></li>
		<li><a href="create_invoice.php">Crear Factura</a></li>				  
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