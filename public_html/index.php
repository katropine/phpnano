<?php
version_compare(PHP_VERSION, '5.3.10', '<') && die('PHPNano requires PHP 5.3.10 or newer.');
error_reporting(-1);

define('ROOTPATH', realpath(dirname(__FILE__)));
define('SITEROOT', '../');  

require_once SITEROOT."vendor/autoload.php";

try{
	PHPNano\Application::getInstance()->run();
}catch (\Exception $e) {
	echo '<h1>Caught exception: ',  $e->getMessage(), "</h1>";
	echo "<pre>";
	echo $e->getTraceAsString();
	echo "</pre>";
	echo "<pre>";
	debug_print_backtrace();
	echo "</pre>";
	exit;
}