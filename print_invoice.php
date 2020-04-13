<?php
@session_start();
require_once "controller/Controller.php";

$result = $_SESSION['user'];
if ($result == null) {
    header("Location:Login.php");
}

$invoice =  new Controller();

if(!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
	$invoiceValues = $invoice->Invoices(0,$_GET['invoice_id']);	
	$itemsF_C=$invoiceValues[0]->fetch_row();
}
$invoiceDate = date("d/M/Y, H:i:s", strtotime($itemsF_C[1]));
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>FACTURA</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	Para,<br />
	<b>RECEPTOR (FACTURA A)</b><br />
	Nombres : '.$itemsF_C[3].'<br /> 
	Dirección de facturación : '.$itemsF_C[4].'<br />
	</td>
	<td width="35%">         
	Factura No. : '.$itemsF_C[0].'<br />
	Factura Fecha : '.$invoiceDate.'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Codigo</th>
	<th align="left">Nombre Producto</th>
	<th align="left">Cantidad</th>
	<th align="left">Precio</th>
	<th align="left">Actual Amt.</th> 
	</tr>';
$count = 0;
while($itemsD_P=$invoiceValues[1]->fetch_row()){   

	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$itemsD_P[0].'</td>
	<td align="left">'.$itemsD_P[1].'</td>
	<td align="left">'.$itemsD_P[2].'</td>
	<td align="left">'.$itemsD_P[3].'</td>
	<td align="left">'.$itemsD_P[2]*$itemsD_P[3].'</td>   
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Total</b></td>
	<td align="left"><b>'.$itemsF_C[2].'</b></td>
	</tr>
	
	';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$invoiceFileName = 'Invoice-'.$itemsF_C[0].'.pdf';

require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>
   