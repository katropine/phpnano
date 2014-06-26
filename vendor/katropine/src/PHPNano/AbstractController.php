<?php
/**
 * Abstract Controller class, modify if you know what your doing
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.3
 */
 
namespace PHPNano; 

use Application\Controller;

abstract class AbstractController {
    
    /**
     *
     * @var Config 
     */
    protected $Config;
    /**
     *
     * @var Config 
     */
    protected $View;
    /**
     *
     * @var Layout 
     */
    protected $Layout;
    /**
     *
     * @var Request 
     */
    protected $_request;

    final public function __set($index, $value){
        throw new \Exception("Can not set undeclared attribute: ".$index.". Use stdObject.");
    }

    public function __call($method, $arguments){
		throw new \Exception("404: Action ".$method." is not defined.");
	}

    public function __construct() {
        $this->init();
        $this->Config = Config::getInstance();
    }
    /**
     * Convention: Override
     */
    public function init(){}

    public function setView(View $View){
        $this->View = $View;
    }
    public function setLayout(Layout $Layout){
        $this->Layout = $Layout;
    }
    public function setRequest($request){
        $this->_request = $request;
    }
}
