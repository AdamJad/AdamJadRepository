<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 25/11/2016
 * Time: 04:18
 */
class Controller
{

    /**
     * Le Modele pour interagire avec la base de donnée
     *
     * @return Model
     */
    protected function getModel($class = null)
    {
        return new Model($class);
    }

    protected function render($fileName, $title, $data = NULL, $default = true)
    {

        $url = ROOTVIEW . 'views/' . strtolower(substr(get_class($this), 0, -10)) . '/' . $fileName . '.php';
        if (is_file($url)) {
            ob_start();
            require_once $url;
            $content_for_layout = ob_get_clean();
            if ($default) {
                require_once ROOTVIEW . 'views/layout/default.php';
            } else {
                echo $content_for_layout;
            }
        } else {
            require_once ROOTVIEW . 'views/error/view_404.php';
        }
    }

    protected function rededition($param)
    {
        header('Location: ' . WEBROOT . $param);
    }

    public static function Router($param)
    {
        if (!empty($_SESSION["user"])) {
            if ($param == "user/authenticate") {
                $param = "article/displayArticles";
            }
            return $param;
        } else {
            return "user/authenticate";

        }

    }

}