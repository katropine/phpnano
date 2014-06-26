<?php
/**
 * Description of Nano
 *
 * @author Katropine.com
 */
namespace Application\Controller;

use PHPNano\AbstractRestfulController;
use PHPNano\JsonView;
use Application\Model as Model;

class RestController extends AbstractRestfulController{
    public function  __construct() {
        parent::__construct();
    }
     public function indexAction(){
       
		$TestModel = new Model\User();
		$json = new JsonView($TestModel->sayHiToAjax());
		$json->render();
	
    }
    public function getIndex(){
		$json = new JsonView(array('restAction' => 'GET: index'));
		$json->render();
    }
    public function postIndex(){
		$json = new JsonView(array('restAction' => 'POST: index'));
		$json->render();
    }
    public function putIndex(){
		$json = new JsonView(array('restAction' => 'PUT: index'));
		$json->render();
    }
    public function deleteIndex(){
		$json = new JsonView(array('restAction' => 'DELETE: index'));
		$json->render();
    }
}
