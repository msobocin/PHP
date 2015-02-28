<?php
require_once 'Controler/BD.php';
require_once 'Model/News.php';

class NewsControler extends BD {
	public static function save($news) {
		$exito = array (
				"succes" => false,
				"id" => 0 
		);
		try {
			$sentencia = parent::$_link->prepare ( "INSERT INTO `BlogPHPMichal`.`News` (`title`,`content`,`date`,`image`,`id_Author`) VALUES (:_title, :_content, :_date, :_imagen,:_idAuthor)" );
			$sentencia->bindParam ( ":_title", $news->__get("_title") );
			$sentencia->bindParam ( ":_content", $news->__get("_content") );
			$sentencia->bindParam ( ":_date", $news->__get("_date") );
			$sentencia->bindParam ( ":_idAuthor", $news->__get("_idAuthor") );
			$sentencia->bindParam ( ":_imagen", $news->__get("_imagen"), PDO::PARAM_LOB );
			
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
	
	public static function consult() {
		$arrNews = array ();
		try {
			$result = parent::$_link->query ( "SELECT News.`id` as _id, `title` as _title, `content` as _content, `date` as _date, `image` as _imagen, `id_Author` as _id_Author, Authors.name as _Author FROM `News` Inner join Authors on id_Author = Authors.id" );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'News' );

			while ( $news = $result->fetch () ) {
				$news->__set("_imagen", '<img src="data:image/jpeg;base64,'.base64_encode($news->__get("_imagen")).'" class="img-responsive" alt="'.$news->__get("_title").'"/>');
				array_push ( $arrNews, $news);
			}
		} catch ( Exception $e ) {
			throw $e;
		}
		return $arrNews;
	}
}

?>