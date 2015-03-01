<?php
require_once 'Controler/BD.php';

class AuthorControler extends BD {
	
	public static function save($name, $user, $password, $admin){
		$exito = array (
				"succes" => false,
				"id" => 0
		);
		try {
			$sentencia = parent::$_link->prepare ( "INSERT INTO `authors`(`name`, `user`, `password`, `admin`) VALUES (:_name, :_user, :_password, :_admin)" );
			$sentencia->bindParam ( ":_name", $name );
			$sentencia->bindParam ( ":_user", $user );
			$sentencia->bindParam ( ":_password", $password );
			$sentencia->bindParam ( ":_admin", $admin );
				
			if ($sentencia->execute ()) {
				$exito ['succes'] = true;
				$lastIdNews = parent::$_link->lastInsertId ();
				$exito ['id'] = $lastIdNews;
			}
		} catch ( PDOException $e ) {
			$exito ['succes'] = false;
			throw $e;
		}
	
		return $exito;
	
	}
	
	public static function login($user, $password) {
		$author = array (//creamos un array asociativo para los datos del login
				"logged" => false,
				"id" => 0,
				"name" => "",
				"admin" => false
		);
		try {
			$result = parent::$_link->query ( "SELECT `id`, name, admin FROM `authors` WHERE user = \"".$user."\" && password = ".$password );
			
			//$result->nos devuelve la id y el nombre del autor si esta correcto el password en la BD

			$loginAuthor = $result->fetch (PDO::FETCH_ASSOC);
				
			$author ['logged'] = true;
			$author ['id'] = $loginAuthor['id'];
			$author ['name'] = $loginAuthor['name'];
			$author ['admin'] = $loginAuthor['admin'];
			
		} catch ( PDOException $e ) {
			$author ['logged'] = false;
			throw $e;
		}
		
		return $author;
	}
}

?>
