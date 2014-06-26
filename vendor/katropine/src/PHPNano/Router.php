<?php
/**
 * Routing class
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.3
 */
 
namespace PHPNano; 

use Application\Controller;

class Router {

    private $Request = null;
    protected $Controller;
    protected $action;
	
    public $file;

    public function __construct() {
        $route = (empty($_REQUEST['route'])) ? '' : $_REQUEST['route'];
        $Request = null;
        if(empty($route)){
			$route = Config::getInstance()->getRegistry()->defaultController.'/'.Config::getInstance()->getRegistry()->defaultAction;
        }
		
		$parts = explode('/', $route);
		$cntName = $parts[0];
		if(isset($parts[1])){
			$cntAction = $parts[1];
		}
		//setting GET & POST values
		$this->Request = new Request();
        
        if (empty($cntName)){
            $cntName = 'index';
        }
        
        if (empty($cntAction)){
            $cntAction = 'index';
        }
        
        $tmpAction = $cntAction."Action";
        
        $tmpName = ucfirst($cntName)."Controller";
        
		if(!method_exists("Application\\Controller\\".$tmpName,$tmpAction)){
			throw new \Exception("<b>No such Action found: ".$cntAction." - Application\\Controller\\{$tmpName}::{$tmpAction}</b>");
		} 
		$this->Controller = strtolower($cntName);
		$this->action = strtolower($cntAction);

    }
    
    public function getController(){
        return $this->Controller;
    }
    public function getAction(){
        return $this->action;
    }
    public function getRequest(){
        return $this->Request;
    }
}
