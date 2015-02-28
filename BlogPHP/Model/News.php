<?php

class News {
	private $_id;
	private $_idAuthor;
	private $_title;
	private $_content;
	private $_date;
	private $_imagen;
	
	public function setAll($id=0, $idAuthor=0, $title="", $content="", $date=null, $imagen=null) {
		$this->_id=$id;
		$this->_idAuthor=$idAuthor;
		$this->_title=$title;
		$this->_content=$content;
		$this->_date=$date;
		$this->_imagen=$imagen;
	}
	
	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}
	
	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
	
		return $this;
	}
}

?>