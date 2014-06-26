<?php
/**
 * Description of Url
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 */
 
namespace PHPNano; 

class Url {
    protected $Config;
    
    private static $_instance = null; 
    
    public function  __construct() {
       $this->Config = Config::getInstance();
    }
    /**
     * Singleton
     */
    public function getInstance(){
		if(self::$_instance == null){
			return new self;
		}else{
			return self::$_instance;
		}
    }
    
    public function get($array){

        return $this->getAbsolute($array);
        // $url = $array['controller']."/".$array['action'];
        // foreach ($array as $key => $value) {
        //     if($key != 'controller' && $key != 'action'){
        //        $url .= "/".$key."/".$value;
        //     }
        // }
        // return $url;
    }
    
    public function getAbsolute($array){
        $url = $this->Config->getBasePath().$array['controller']."/".$array['action'];
        foreach ($array as $key => $value) {
            if($key != 'controller' && $key != 'action'){
               $url .= "/".$key."/".$value;
            }
        }
        return $url;
    }
    
    public function getBase(){
        return $this->Config->getBasePath();
    }

}
