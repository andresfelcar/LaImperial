<?php
@session_start();
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'controller/Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']);
	if (!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name'] . "" . $user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:invoice_list.php");
	} else {
		$loginError = "Usuario o Contraseña Incorrecta";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link href="resource/css/style.css" rel="stylesheet">
	<link href="resource/css/index_php.css" rel="stylesheet">
</head>

<body>
	<div class="naveg">
		<div class="heading">
			<h2 id="hh">Bienvenido a la Imperial</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">

			<div class="login-form">
				<form action="" method="post">
					<h2 class="text-center">Iniciar Sesión</h2>
					<div class="form-group">
						<?php if ($loginError) { ?>
							<div class="alert alert-warning"><?php echo $loginError; ?></div>
						<?php } ?>
					</div>
					<div class="form-group">
						<input name="email" id="email" type="email" class="form-control" placeholder="Correo" autofocus required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pwd" placeholder="Contraseña" required>
					</div>
					<div class="form-group">
						<button type="submit" name="login" class="btn btn-primary" style="width: 100%;"> Acceder </button>
					</div>
					<div class="clearfix">
						<label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
					</div>
				</form>
			</div>
		</div>
		<div class="col-xs-6">-</div>
	</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="js/invoice.js"></script>
</body>

</html>