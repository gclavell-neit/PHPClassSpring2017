<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of School
 *
 * @author 001378362
 */
class School {
    protected $color = null;
    protected $size = null;
    protected $location = null;
   
    
    public function __construct($col, $sz, $loc) {
        $this->setColor($col);  
		$this->setSize($sz);
		$this->setLocation($loc);
    }
	
	protected function getColor(){
            return $this->color;
	}
	protected function getSize(){
            return $this->size;
	}
	protected function getLocation(){
            return $this->location;
	}
	
	protected function setColor($col){
		$this->color = $col;
	}
	protected function setSize($sz){
		$this->size = $sz;
	}
	protected function setLocation($loc){
		$this->location = $loc;
	}
           
    public function display() { 
        
        return "Color: "+$this->getColor()+" Size: "+$this->getSize()+" Location: "+ $this->getLocation();        
    }
}
