<?php
require('html2pdf.php');
require_once 'Controler/NewsControler.php';
require_once 'Model/News.php';


	$pdf=new PDF_HTML();
	$pdf->SetFont('Arial','',12);
	$pdf->AddPage();
	$pdf->Image('img/bg.png', 0, 0, $pdf->w, $pdf->h);
	$newsId=$_REQUEST['news'];
	NewsControler::connectBD();
	$news=NewsControler::consultById($newsId);
	NewsControler::disconnectBD();
	$text=$news->__get("_content");
	if(ini_get('magic_quotes_gpc')=='1')
		$text=stripslashes($text);
	
	$pdf->WriteHTML(utf8_decode("<h1><b>".$news->__get('_title')."</b></h1><br><br>"));
	$pdf->WriteHTML(utf8_decode("<h1><b>".$news->__get('_imagen')."</b></h1><br><br>"));
	$pdf->WriteHTML(utf8_decode($text));

	$pdf->Output();
	exit;

?>