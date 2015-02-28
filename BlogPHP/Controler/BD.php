<?php
/**
 * @author Michal Sobocinski
 */

class BD {
	protected static $_link;
	
	public static function connectBD() {
		try{
			self::$_link = new PDO("mysql:host=localhost;dbname=recetasmgc", "root", "secret");
		
			self::$_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch (PDOException $e){
			throw  $e;
		}
		
	}
	
	public static function disconnectBD() {
		//mysqli::close();
		try {
			self::$_link = null;
		} catch (Exception $e) {
			throw $e;
		}
		
	}
	
// 	public function __getLink(){
// 		return $this->_link;
// 	}
}

?>