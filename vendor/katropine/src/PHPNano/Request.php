<?php
/**
 * Handles the variables and values passed by GET [/bla/1/]
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.2
 */
namespace PHPNano; 

class Request extends Registry{

    protected $post;
    protected $get;
	
    public function  __construct() {
        parent::__construct();
        $this->post = new Registry();
        $this->get = new Registry();
        if($this->isPost()){
            $this->setPostValues($_POST);
        }
        if($this->isGet()){
            $this->setGetValues($_GET);
        }
    }

    public function isAjax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
    }
    public function isPost(){
        return ($_SERVER['REQUEST_METHOD'] == 'POST')? true : false;
    }
    public function isGet(){
        return ($_SERVER['REQUEST_METHOD'] == 'GET')? true : false;
    }
    public function isPut(){
        return ($_SERVER['REQUEST_METHOD'] == 'PUT')? true : false;
    }
    public function isDelete(){
        return ($_SERVER['REQUEST_METHOD'] == 'DELETE')? true : false;
    }
    private function setGetValues($get = null){
        if($get != null && count($get) > 0){
			$get = filter_var_array($get, FILTER_SANITIZE_STRING);
			$parts = explode('/', $get['route']);
			$cnt = count($parts);
			$prm = array();
			if($cnt >= 4){
				// ignore first 2 (0: controller & 1: action)
				for($i = 2; $i < $cnt; $i++){
				if(!($i%2)){
					$this->get->$parts[$i] = $parts[$i+1];
				}
				}
			}
		}
    }
    private function setPostValues($post){
        $cnt = count($post);
        if($cnt > 0){
			$post = filter_var_array($post, FILTER_SANITIZE_STRING);
            foreach($post as $k=>$v){
              $this->post->$k = $v;
            }
        }
        
    }
    /**
     * @return sanitised $_GET
     */
    public function get(){
		return $this->get;
    }
    /**
     * @return sanitise $_POST
     */
    public function post(){
		return $this->post;
    }
    
    public function getRaw(){
		$getObject = new \stdClass();
		if($_GET != null && count($_GET) > 0){
			$get = filter_var_array($_GET, FILTER_SANITIZE_STRING);
			$parts = explode('/', $get['route']);
			$cnt = count($parts);
			$prm = array();
			if($cnt >= 4){
				// ignore first 2 (0: controller & 1: action)
				
				for($i = 2; $i < $cnt; $i++){
				if(!($i%2)){
					$getObject->$parts[$i] = $parts[$i+1];
				}
				}
			}
		}
    
		return $getObject;
    }
    
    public function postRaw(){
        $cnt = count($_POST);
        $post = new \stdClass();
        if($cnt > 0){
			foreach($_POST as $k=>$v){
              $post->$k = $v;
            }
        }
		return $post;
    }
}
