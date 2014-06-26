<?php
/**
 * Description of Nano
 *
 * @author Katropine.com
 */
namespace Application\Controller;

use PHPNano\AbstractController;
use PHPNano\JsonView;
use Application\Model as Model;

class NanoController extends AbstractController{
    public function  __construct() {
        parent::__construct();
    }
    public function indexAction(){
        $this->Layout->title = "Test page";
        $this->View->message = "This is nano controller!";
        $this->View->var1 = $this->_request->get()->var1;
        $this->View->var2 = $this->_request->get()->var2;
        
        $this->View->var1Raw = $this->_request->getRaw()->var1;
        $this->View->var2Raw = $this->_request->getRaw()->var2;
        
        $this->View->var3 = $this->_request->post()->var3;
        $this->View->var4 = $this->_request->post()->var4;
        $this->View->var3Raw = $this->_request->postRaw()->var3;
        $this->View->var4Raw = $this->_request->postRaw()->var4;

        /**********************************************************
        * load(View) is mandatory for all Actions except Ajax
        **********************************************************/
        $this->Layout->load($this->View);
    }
     public function testajaxAction(){
        if($this->_request->isAjax()){
            $TestModel = new Model\User();
            $json = new JsonView($TestModel->sayHiToAjax());
            $json->render();
        }else{
            die("That was not Ajax request!");
        }
    }
}
