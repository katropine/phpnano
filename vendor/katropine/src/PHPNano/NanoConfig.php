<?php
/**
 * Description of Config
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.1.1
 */
 
namespace PHPNano; 

abstract class NanoConfig {
    static private $nanoversion = "1.7";

    protected static $_instance;
    protected $Registry;
    protected $basepath;

    protected $dev = true;

    protected function  __construct() {
         $this->Registry = new Registry();
    }
    /**
     * Convention: Override
     */
    public static function getInstance(){}
    /**
     * Fuse the Child class with NanoConfig and creates a singleton
     *
     * @param string __CLASS__ name caller
     * @return Config
     */
    protected static function fuse($class){
        if ( ! isset(self::$_instance)) {
            self::$_instance = new $class();
        }
        return self::$_instance;
    }
    /**
     * 
     * @return string Framework version
     */
	public function getVersion(){
		return self::$nanoversion;
	}
    /**
     *
     * @return Registry 
     */
    public function getRegistry(){
        return $this->Registry;
    }
    public function getBasePath(){
        return $this->Registry->basepath;
    }
    public function  __set($name, $value) {
        throw new \Exception("<h1>".$name." is not defined. Use Registry class to dynamicly assign object properties.</h1>");
    }
    public function  __get($name) {
        throw new \Exception("<h1>".$name." is not defined. Use Registry class to dynamicly assign object properties.</h1>");
    }
}
