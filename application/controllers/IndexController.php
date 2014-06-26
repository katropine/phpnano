<?php
/**
 * Description of Index
 *
 * @author Katropine.com
 */
namespace Application\Controller;
 
use \PHPNano\Config;
use \PHPNano\AbstractController;
use \PHPNano\View;
use Application\Model as Model;
 
class IndexController extends AbstractController{
   public function  __construct() {
        parent::__construct();
    }
    public function indexAction(){
        
        $this->Layout->title = "!!!";
        $this->View->message = "Hi :), <br>This is PHPNano ".Config::getInstance()->getVersion().", (Light) MVC Framework by Katropine.com";
        $TestModel = new Model\User();
        $this->View->model = $TestModel->sayHi();
        $this->View->description = '<br> No database layer provided, use PDO';

        $partial = new View('index', 'nanopartial');
        $partial->sayhipartial = "This is a partial";
        $this->View->partialexample = $partial->renderPartial();


        /**********************************************************
        * load(View) is mandatory for all Actions except Ajax
        **********************************************************/
        $this->Layout->load($this->View);
    }
    
    
}
