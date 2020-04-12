<?php
session_start();
//validacion de inicio de sesion
include 'controller/Invoice.php';

$invoice = new Invoice();

$invoice->checkLoggedIn();
if (!empty($_POST['companyName']) && $_POST['companyName']) {
    $invoice->saveInvoice($_POST);
    header("Location:invoice_list.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link href="resource/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="naveg">
    <h2 id="hh">Crear Factura</h2>
    </div>
    <div class="container content-invoice">
        <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate>
            <div class="load-animate animated fadeInUp">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <h2 class="title">Sistema de Facturación el Imperial</h2>
                        <?php include('menu.php'); ?>
                    </div>
                </div>
                <input id="currency" type="hidden" value="$">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <h3>De,</h3>
                        <?php echo $_SESSION['user']; ?><br>
                        <?php echo $_SESSION['address']; ?><br>
                        <?php echo $_SESSION['mobile']; ?><br>
                        <?php echo $_SESSION['email']; ?><br>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
                        <h3>Para,</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Nombre de Empresa" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Su dirección"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table table-bordered table-hover" id="invoiceItem">
                            <tr>
                                <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                <th width="15%">Prod. No</th>
                                <th width="38%">Nombre Producto</th>
                                <th width="15%">Cantidad</th>
                                <th width="15%">Precio</th>
                                <th width="15%">Total</th>
                            </tr>
                            <tr>
                                <td><input class="itemRow" type="checkbox"></td>
                                <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
                                <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
                                <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off" readonly="readonly"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
                        <button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <h3>Notas: </h3>
                        <div class="form-group">
                            <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Notas"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                            <input data-loading-text="Guardando factura..." type="submit" name="invoice_btn" value="Guardar Factura" class="btn btn-success submit_btn invoice-save-btm">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <span class="form-inline">
                            <div class="form-group">
                                <label>Total: &nbsp;</label>
                                <div class="input-group">
                                    <div class="input-group-addon currency">$</div>
                                    <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="resource/js/invoice.js"></script>
</body>

</html>