<?php

/**
 * Created by PhpStorm.
 * User: Adam
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

    protected function render($fileName, $title, $data = NULL)
    {

        $url = ROOTVIEW . 'views/' . strtolower(substr(get_class($this), 0, -10)) . '/' . $fileName . '.php';
        if (is_file($url)) {
            ob_start();
            require_once $url;
            $content_for_layout = ob_get_clean();
            require_once ROOTVIEW . 'views/layout/default.php';
        } else {
            require_once ROOTVIEW . 'views/error/view_404.php';
        }
    }


}