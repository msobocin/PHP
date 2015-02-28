<?php
/**
 * @author Michal Sobocinski
 */

require_once 'Controler/NewsControler.php';
require_once 'View/NewsView.php';
require_once 'View/HTMLView.php';

HTMLView::header();



$newsView = new NewsView();

if (isset($_REQUEST['news'])) {
	NewsControler::connectBD();
	$news = NewsControler::consultById($_REQUEST['news']);
	NewsControler::disconnectBD();
	$newsView->viewNews($news);
	
}else {
	NewsControler::connectBD();
	$arrNews = NewsControler::consult();
	NewsControler::disconnectBD();
	$newsView->view($arrNews);
}

?>

<?php 
HTMLView::footer();
?>