<?php
/**
 * Description of Layout
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since Dec 11, 2010
 * @version 1.0.0
 */

namespace PHPNano; 
 
class Layout{

    public $_content;
    protected $file = null;
    private $vars = array();
    private $_Url;

    public function __construct(){
        $this->file = ROOTPATH.'/../application/layouts/'.Config::getInstance()->getRegistry()->layoutName.".php";
        $this->_Url = new Url();
    }
    public function __set($index, $value){
        $this->vars[$index] = $value;
    }
    public function load(View $View){        

		if(!file_exists($this->file)) {
			throw new \Exception("No such Layout file: ".$this->file);
		}
		foreach ($this->vars as $key => $value){
			$$key = $value;
		}
		${'Url'} = $this->_Url;
		//Just for understanding
		$View = $View;
		$View->setUrl($Url);
		include $this->file;
       
    }
    public function headTitle($title){
        return $title;
    }
}
