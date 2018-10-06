<?php

/* 
 * Front Controller Page. All requests will be directed to this file
 */

$config = require "config/config.php";
require "helpers.php";
$url = explode("/",$_SERVER['REQUEST_URI']);

array_shift($url);
array_shift($url);

$className = array_shift($url);
$methodName = array_shift($url);

if(empty($methodName)) {
    $methodName = "index";
}

if(empty($className)) {
    $className = "home";
}

spl_autoload_register(function($class) {

    $splitted = explode("\\", $class);
    array_shift($splitted);
    $fullClass = implode(DIRECTORY_SEPARATOR, $splitted);
    
    if(!$fullClass) {
        throw new \Exception ("No such class");
        
    }
    
    $path = $fullClass . '.php';
    if($path != FALSE && is_readable($path) && file_exists($path) ){
        include $fullClass . '.php';
    }else {
        throw new \Exception ("No such file");
    }
    
});

/*use Ecommerce\App\DB;
$Db = new DB;
$Db = $Db->connect();
*/

use Ecommerce\App\Session;
Session::start();
$_SESSION['locale'] = "bg";
\Ecommerce\App\CSRFToken::set();


try {
    $controllerName = "\\Ecommerce\\Controllers\\" . ucfirst($className) . "Controller";

    $controller = new $controllerName();

    
    
    call_user_func_array(array(new $controllerName,$methodName), $url);
    /*$controller->$methodName($url);*/
} catch (Exception $ex) {
    
    if($config["debug"]) {
        pretty_log($ex);
    }else {
       $error = new Ecommerce\Controllers\ErrorController();
       $error->index();
    }
    
}
