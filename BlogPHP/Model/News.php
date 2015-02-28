<?php

class News {
	private $_id;
	private $_idAuthor;
	private $_title;
	private $_content;
	private $_date;
	private $_image;
	
	
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