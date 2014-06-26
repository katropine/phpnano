<?php
/**
 * Config file is for, well for config stuff. make variables in init()
 * 
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.2
 * 
 */
namespace PHPNano; 
 
class Config extends NanoConfig{

    public static function getInstance(){
       $cfg = parent::fuse(__CLASS__);
       $cfg->init();
       return $cfg;
    }
    protected function init(){
        
       $config = include ROOTPATH."/../application/config/config.php";
       $this->Registry = json_decode(json_encode($config), FALSE);

    }
}
