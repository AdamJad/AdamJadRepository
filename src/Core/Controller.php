<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 25/11/2016
 * Time: 04:18
 */
require_once "Model.php";

class Controller
{

    /**
     * Le Modele pour interagire avec la base de donnée
     *
     * @return Model
     */
    protected function getModel()
    {
        return new Model();
    }


}