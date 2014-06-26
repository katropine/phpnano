<?php
/**
 * Abstract Model class, modify if you know what your doing
 *
 * @author Katropine.com
 * @copyright www.katropine.com
 * @license MIT
 * @since 19.11.2010. or 19 Nov. 2010
 * @version 1.0.1
 */

namespace PHPNano; 
 
abstract class Model {
    protected $Config;
    public function __construct() {
        $this->Config =  Config::getInstance();
    }
}

