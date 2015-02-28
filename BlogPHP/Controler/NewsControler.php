<?php
require_once 'Controler/BD.php';
require_once 'Model/News.php';

class NewsControler extends BD {
	public static function save($news, $idAuthor) {
		$exito = array (
				"succes" => false,
				"id" => 0 
		);
		try {
			$sentencia = parent::$_link->prepare ( "INSERT INTO `BlogPHPMichal`.`News` (`content`,`date`,`image`,`id_Author`) VALUES (:_content, :_date, :_image,:_idAuthor)" );
			$sentencia->bindParam ( ":_content", $news->__get("_content") );
			$sentencia->bindParam ( ":_date", $news->__get("_date") );
			$sentencia->bindParam ( ":_idAuthor", $news->__get("_idAuthor") );
			$sentencia->bindParam ( ":_image", $news->__get("_image"), PDO::PARAM_LOB );
			
			if ($sentencia->execute ()) {
				$exito ['succes'] = true;
				$lastIdNews = $this->_link->lastInsertId ();
				$exito ['id'] = $lastIdNews;
			}
		} catch ( PDOException $e ) {
			$exito ['succes'] = false;
			throw $e;
		}
		
		return $exito;
	}
}

?>