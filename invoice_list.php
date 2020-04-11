<?php
session_start();

include 'controller/Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>
  <div class="naveg">
  <h2 id="hh">Facturas</h2>
  </div>
  <div class="container">
    <h2 class="title">Sistema de Facturacion el Imperial</h2>
    <?php include('menu.php'); ?>
    <table id="data-table" class="table table-condensed table-striped">
      <thead>
        <tr>
          <th width="7%">Fac. No.</th>
          <th width="15%">Fecha Creación</th>
          <th width="35%">Cliente</th>
          <th width="15%">Fatura Total</th>
          <th width="3%"></th>
          <th width="3%"></th>
          <th width="3%"></th>
        </tr>
      </thead>
      <?php
      $invoiceList = $invoice->getInvoiceList();
      foreach ($invoiceList as $invoiceDetails) {
        $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
        echo '
      <tr>
        <td>' . $invoiceDetails["order_id"] . '</td>
        <td>' . $invoiceDate . '</td>
        <td>' . $invoiceDetails["order_receiver_name"] . '</td>
        <td>' . $invoiceDetails["order_total_before_tax"] . '</td>
        <td><a href="print_invoice.php?invoice_id=' . $invoiceDetails["order_id"] . '" title="Imprimir Factura"><div class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></div></a></td>
        <td><a href="edit_invoice.php?update_id=' . $invoiceDetails["order_id"] . '"  title="Editar Factura"><div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div></a></td>
        <td><a href="#" id="' . $invoiceDetails["order_id"] . '" class="deleteInvoice"  title="Borrar Factura"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>
    ';
      }
      ?>
    </table>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="resource/js/invoice.js"></script>
</body>

</html>