<?php
/**
 * 
 * @author Michal Sobocinski
 *
 */

class HTMLView {
	public static function header() {
?>
		<!DOCTYPE html>
		<html lang="es">
		  <head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <title>Blog PHP MICHAL SOBOCINSKI</title>
		
		    <!-- Bootstrap -->
		    <link href="css/bootstrap.min.css" rel="stylesheet">
		    <link rel="stylesheet" href="css/jasny-bootstrap.min.css">
			<link href="css/main.css" rel="stylesheet" />
			
		    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		    <![endif]-->
		  </head>
		  <body>
		  <nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php"><img alt="Brand" class="bookmarks" src="img/bookmark.png" width="70" style="margin-top: -26px;"></a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="index.php">Blog <span class="sr-only">(current)</span></a></li>
			        <li><a href="addNews.php">Añadir Noticia</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		  
		  <div class="container" style="margin-top: 80px;">
<?php
	}
	
	public static function footer() {
		?>
			</div>
			<footer class="container-fluid">
				<div class="col-sm-4 col-sm-offset-4 footer">
					<h1 align="center" style="margin-bottom: 0px; padding-bottom: 15px;">BLOG CMS by Michal Sobocinski</h1>
				</div>
			</footer>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		    <!-- Include all compiled plugins (below), or include individual files as needed -->
		    <script src="js/bootstrap.min.js"></script>
		    <script src="js/jasny-bootstrap.min.js"></script>
		  </body>
		</html>
		<?php
	}
	
	public static function tinyMCE() {
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
		tinymce.init({
		    selector: "textarea",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
		</script>
		<?php
	}
	
}

?>