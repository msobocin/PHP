<?php
require_once 'Controler/BD.php';

class AuthorControler extends BD {
	public static function login($user, $password) {
		$author = array (
				"logged" => false,
				"id" => 0
		);
		try {
			$result = parent::$_link->query ( "SELECT `id` FROM `authors` WHERE user = \"".$user."\" && password = ".$password );
			$id = $result->fetch ();
				
			$author ['logged'] = true;
			$author ['id'] = $id;

		} catch ( PDOException $e ) {
			$author ['logged'] = false;
			throw $e;
		}
		
		return $author;
	}
}

?>
