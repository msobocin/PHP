<?php

/**
 * @author Michal Sobocinski
 */
require_once 'Controler/AuthorControler.php';
require_once 'Model/News.php';
require_once 'View/HTMLView.php';
session_start();

if (!isset($_SESSION['author'])||!$_SESSION['author']['admin']) {
	header('Location: index.php');
	exit();
}

HTMLView::header ();

if (isset($_REQUEST['enviar'])) {
	$nom = $_REQUEST['nom'];
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];
	$admin = 0;
	if (isset($_REQUEST['admin'])) {
		$admin = 1;
	}

	AuthorControler::connectBD();
	$exito = AuthorControler::save($nom,$user,$pass,$admin);
	AuthorControler::disconnectBD();
}

?>

<form role="form" method="post" action="addAuthor.php">
  <div class="form-group">
    <label for="nom">Nombre</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="user">User</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="User">
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="admin" value=1> Administrador?
    </label>
  </div>
  <button type="submit" name="enviar" class="btn btn-default">Submit</button>
</form>


<?php
HTMLView::footer ();
?>