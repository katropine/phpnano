<?php

/**
 * Abstract Controller class, modify if you know what your doing
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 27.02.2014. or 27 Feb. 2014
 * @version 1.0.0
 */
 
 
namespace PHPNano; 

class JsonView{
		
	protected $data = array();

	public function __construct(array $a){
		$this->data = $a;
	}

	public function render(){
		header('Content-type: application/json');
		echo json_encode($this->data);
		exit;
	}


}