<?php

require_once 'View/HTMLView.php';
require_once 'Controler/AuthorControler.php';

HTMLView::header();

if (isset($_REQUEST['enviar'])) {
	AuthorControler::connectBD();
	$_SESSION['author'] = AuthorControler::login($_REQUEST['user'], $_REQUEST['password']);
	AuthorControler::disconnectBD();
}

if (isset($_SESSION['author']) && $_SESSION['author']['logged']) {
	header('Location: index.php');
	exit();
}

if (!isset($_SESSION['author'])) {
	$_SESSION['author'] = array (
				"logged" => false,
				"id" => 0
		);
}

?>

<form class="form-horizontal" role="form" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
  <div class="form-group">
    <label for="user" class="col-sm-2 control-label">User</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="user" name="user" placeholder="User">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="enviar" class="btn btn-default">Login</button>
    </div>
  </div>
</form>

<?php 
HTMLView::footer();
?>