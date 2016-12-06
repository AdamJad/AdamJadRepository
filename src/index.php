<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 24/11/2016
 * Time: 21:37
 */
session_start();
define("ROOTVIEW", str_replace("src/index.php", "", $_SERVER["SCRIPT_FILENAME"]), TRUE);
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]), TRUE);
define("WEBROOT", str_replace("src/index.php", "", 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"]), TRUE);

require_once ROOT . 'DbConn.php';
require_once ROOT . 'core/Model.php';
require_once ROOT . 'core/Entity.php';
require_once ROOT . 'core/Controller.php';


$get = (!empty($_GET["p"])) ? $_GET["p"] : "";

$get = Controller::Router($get);

$params = explode('/', $get);
$controller = $params[0] = (!empty($params[0])) ? $params[0] : "user";
$action = $params[1] = (!empty($params[1])) ? $params[1] : "displayUser";
$entity = ucfirst(strtolower($controller));
$controller = ucfirst(strtolower($controller)) . 'Controller';

$urlEntity = ROOT . 'Entity/' . $entity . '.php';
$urlController = ROOT . 'Controller/' . $controller . '.php';
if (is_file($urlController)) {
    if (is_file($urlEntity))
        require_once $urlEntity;
    require_once $urlController;

    $controller = new $controller();
    if (method_exists($controller, $action)) {
        $classMethod = new ReflectionMethod($controller, $action);
        $argsCount = count($classMethod->getParameters());
        $paramsCount = count($params) - 2;
        if ($argsCount == $paramsCount) {
            $args = array();
            if ($paramsCount != 0) {
                for ($i = 2; $i < $paramsCount + 2; $i++) {
                    $args[] = $params[$i];
                }
            }
            call_user_func_array(array($controller, $action), $args);
        } else {
            echo 3;
            require_once ROOTVIEW . 'views/error/404.php';
        }
    } else {
        echo 2;
        require_once ROOTVIEW . 'views/error/404.php';
    }
} else {
    echo 1;
    require_once ROOTVIEW . 'views/error/404.php';
}
