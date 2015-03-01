<?php

require_once 'Controler/BD.php';
require_once 'Model/Grafico.php';

class GraphControler extends BD
{
	
	public static function consultCantidad()
	{
	
		$arrGrafico = array ();
		try {
			$result = parent::$_link->query ( "SELECT count(news.id) as _cantidad, authors.name as _name FROM news inner join authors on `id_Author` = Authors.id GROUP BY `id_Author`" );
			$result->setFetchMode ( PDO::FETCH_CLASS, 'Grafico' );
			
			while ( $grafico = $result->fetch () ) {
				array_push ( $arrGrafico, $grafico);
			}
		} catch ( Exception $e ) {
			throw $e;
		}
		return $arrGrafico;
	
	}
}

?>