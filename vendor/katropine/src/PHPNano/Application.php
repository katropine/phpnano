<?php
/**
 * Description of Application
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since Dec 11, 2010
 * @version 1.0.1
 */
namespace PHPNano; 


class Application {
    private static $_instance;
    private $Router;

    protected $Controller;
    protected $action;

    private function __construct(){
         $this->Router = new Router();
    }
    public static function getInstance(){
        if ( ! isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
  
    }
    public function getLayout(){
        $Layout = new Layout();
        return $Layout;
    }
    public function run(){
        $controllerName = "Application\\Controller\\". ucfirst($this->Router->getController())."Controller";
        $actionName = $this->Router->getAction();
        
        $this->Controller = new $controllerName();
        $this->Controller->setRequest( (is_object($this->Router->getRequest()))? $this->Router->getRequest() : null );
        
        if(get_parent_class($this->Controller) == 'PHPNano\AbstractController'){
			$this->Controller->setView(new View($this->Router->getController(),  $actionName) );
            $this->Controller->setLayout(new Layout());
            $this->action = strtolower($actionName)."Action";
        }else{
			throw new Exception("Wrong controller type");
        }
        
        $action = $this->action;
        
        $this->Controller->$action();
    }
    
}
