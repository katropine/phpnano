<?php
/**
 * Description of BaseUrl
 *
 * @author Kriss
 * @since Dec 12, 2010
 */
namespace Application\View\Helper; 
 
class GlobalMenu {

    private $menu;

    public function  __construct() {
        $this->menu = "Menu1 | Menu2 | Menu3 | Menu4 | Menu5";
    }
    public function getMenu(){
        return $this->menu;
    }
}
