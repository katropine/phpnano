<?php
/**
 * Use this class instead of global variables (db connections and stuff), every controller will have this object
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.1
 */
 
namespace PHPNano; 

class Registry {

    private $vars = array();

    public function  __construct() {}

    public function __set($index, $value){
        $this->vars[$index] = $value;
    }

    public function __get($index){
       if (isset($this->vars[$index])) {
            return $this->vars[$index];
       }
       return null;
    }
}
