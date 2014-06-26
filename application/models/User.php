<?php
/**
 * Description of User
 *
 * @author Katropine.com
 */
 
namespace Application\Model; 
 
 
 
class User extends \PHPNano\Model{
    public function  __construct() {
        parent::__construct();
    }
    public function sayHi(){
        return "Model here, do some bussines logic in here!";
    }
    public function sayHiToAjax(){
        return array("data" => "Ajax, data from Application\Model\User() rendered by JsonView()");
    }
}