<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 25/11/2016
 * Time: 03:41
 */
require_once "C:\\xampp\\htdocs\\AdamJadRepository\\src\\DbConn.php";
require_once "C:\\xampp\\htdocs\\AdamJadRepository\\src\\Entity\\User.php";

class Model
{
    /**
     * Instance de singleton DbConn
     *
     * @var DbConn
     */
    private $dbConn;

    /**
     *
     *
     * @var string
     */
    private $class;

    /**
     * Model constructor.
     *
     * @param DbConn $dbConn
     */
    public function __construct($class = null)
    {
        $this->dbConn = DbConn::getInstance();
        $this->table = $class;
    }

    /**
     * @return DbConn
     */
    public function getDbConn()
    {
        return $this->dbConn;
    }

    /**
     * Méthode renvoie toutes les entités d'une table
     *
     * @return array
     */
    public function findAll()
    {
        $entities = null;
        return $entities;
    }

    public function save($object)
    {
        $param = $object->getObjectVars();
        $i = 0;
        $fields = "";
        $values = "";
        foreach ($param as $key => $value) {
            if (!is_null($value)) {
                $fields .= $key . ',';
                $values .= ":vars" . $i . ",";
                $vars["vars" . $i] = $value;
                $i++;
            }
        }
        $values = substr($values, 0, -1);
        $fields = substr($fields, 0, -1);
        $query = "INSERT INTO " . "user" . " ( " . $fields . " ) VALUES ( " . $values . " )";
        $this->getDbConn()->execute($query, $vars);

        //print_r($vars);
        //echo $query;
    }


}