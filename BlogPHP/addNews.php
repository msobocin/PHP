<?php

/**
 * @author Michal Sobocinski
 */
require_once 'Controler/NewsControler.php';
require_once 'Model/News.php';
require_once 'View/HTMLView.php';

HTMLView::header ();
HTMLView::tinyMCE ();
$exito = array (
		"succes" => false,
		"id" => 0
);

if (isset($_REQUEST['enviar'])) {
	$title = $_REQUEST['title'];
	$content = $_REQUEST['content'];
	$date = (new \DateTime())->format('Y-m-d H:i:s');
// 	$imagen = fopen($_FILES['imagen']['tmp_name'], 'rb');
	if (!empty($_FILES['imagen']['tmp_name'])) {
		$imagen = fopen($_FILES['imagen']['tmp_name'], 'rb');
	}else {
		$imagen = fopen("img/news2.gif", "rb");
	}
	
	$news = new News();
	$news->setAll(0,1,$title,$content,$date,$imagen);
	
	NewsControler::connectBD();
	$exito = NewsControler::save($news);
	NewsControler::disconnectBD();
	
	
}
?>

<form enctype="multipart/form-data" role="form" method="post" action="addNews.php">
	<div class="form-group">
		<div class="row">
			<div class="fileinput fileinput-new col-sm-5 col-sm-offset-1"
				data-provides="fileinput">
				<div class="fileinput-new thumbnail img-responsive img-circle"
					style="width: 100%; height: 150px;">
					<img src="img/news2.png" alt="news">
				</div>
				<div
					class="fileinput-preview fileinput-exists thumbnail img-responsive img-circle"
					style="max-width: 100%; max-height: 150px;"></div>
				<div>
					<span class="btn btn-default btn-file"><span class="fileinput-new">Select
							image</span><span class="fileinput-exists">Change</span>
							<input type="file" id="imagen" name="imagen" /></span> <a href="#"
						class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<label for="title">Title</label> <input type="text"
						class="form-control" id="title" name="title" placeholder="Title">
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-10">
			<textarea class="form-control" rows="20" name="content"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-10">
			<button type="submit" name="enviar" class="btn btn-default">Añadir</button>
		</div>
	</div>


</form>

<?php
HTMLView::footer ();
?>