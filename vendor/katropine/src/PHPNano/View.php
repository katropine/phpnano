<?php
/**
 * View call generates Partials in layout 
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.3
 */
 
namespace PHPNano; 

class View{
    private $Registry;
    private $vars = array();
    private $file;
    
    private $_Url;

    public function __set($index, $value){
        $this->vars[$index] = $value;
    }
    
    public function  __construct($controller, $action){
    	$this->file = ROOTPATH."/../application/views/".$controller."/".$action.".php";
    	if(!file_exists($this->file)){
    		$this->file = ROOTPATH."/../application/views/".$controller."/".$action.".twig.php";
    	}
        $this->Registry = new Registry();
    }
    public function render(){
       
		if(file_exists($this->file)){
			if(self::isTwig($this->file)){
				
				$twig = new \Twig_Environment(new \Twig_Loader_String(), array(
			        'autoescape' => false,
			    ));
			    
			    $templateOutput = file_get_contents($this->file);
				
				$this->vars['Url'] = $this->_Url;
			    echo $twig->render($templateOutput, $this->vars);

			}else{
				foreach ($this->vars as $key => $value){
					$$key = $value;
				}
				${'Url'} = $this->_Url;
				include $this->file;
			}
		}else{
			throw new \Exception("No such View file as ".$this->file." (class: View; method: render())");
		}
	
    }
    public function renderPartial(){
       
		if(file_exists($this->file)){
			ob_start();
			foreach ($this->vars as $key => $value){
				$$key = $value;
			}
			${'Url'} = $this->_Url;
			include $this->file;
			$render_html = ob_get_clean();
			return $render_html;
		}else{
			throw new \Exception("No such View file as ".$this->file." (class: View; method: render())");
		}
       
    }
    public function setUrl(Url $Url){
        $this->_Url = $Url;
    }
    protected static function isTwig($file){
    	$parts = explode('.', $file);
    	if('twig' === $parts[3]){
    		return true;
    	}
    	return false;
    }
}
