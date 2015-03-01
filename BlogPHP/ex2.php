<?php
require('WriteHTML.php');
require_once 'Controler/NewsControler.php';
require_once 'Model/News.php';

$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial');
$newsId=$_REQUEST['news'];
NewsControler::connectBD();
$news=NewsControler::consultById($newsId);
NewsControler::disconnectBD();
$text=$news->__get("_content");
$pdf->WriteHTML(utf8_decode($text));
$pdf->Output();
?>
