<?php
	require('WriteHTML.php');
	require_once("../models/tipo_usuarios.php");
	$obj = new Tipo_usuario();
	$html = $obj->factura($_GET['id']);

	$pdf=new PDF_HTML();
	$pdf->AddPage();
	$pdf->SetFont('Arial');
	$pdf->WriteHTML( utf8_decode($html)  );
	$pdf->Output();
?>