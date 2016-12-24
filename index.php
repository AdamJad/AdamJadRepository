<?php
/**
 * Created by PhpStorm.
 * User: Med
 * Date: 24/11/2016
 * Time: 21:37
 */
session_start();
define("ROOTVIEW", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]), TRUE);
define("ROOT", str_replace("index.php", "src/", $_SERVER["SCRIPT_FILENAME"]), TRUE);
define("WEBROOT", str_replace("index.php", "", 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"]), TRUE);

require_once ROOT . 'DbConn.php';
require_once ROOT . 'core/Model.php';
require_once ROOT . 'core/Entity.php';
require_once ROOT . 'core/Controller.php';
require_once ROOT . 'core/Acces.php';
require_once ROOT . 'Entity/User.php';


$get = (!empty($_GET["p"])) ? $_GET["p"] : "";

$get = Controller::Router($get);
if (!$get)
    Controller::error();

$params = explode('/', $get);
$controller = $params[0];
$action = $params[1];
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
            Controller::error();
        }
    } else {
        Controller::error();
    }
} else {
    Controller::error();
}