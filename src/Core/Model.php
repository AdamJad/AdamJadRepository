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
        $this->class = $class;
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
        $sql = "SELECT * FROM ".$this->class;
        $request = $this->getDbConn()->query($sql);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        $entities = array();
        foreach ($data as $row) {
            $id = $row['id'];
            $entities[$id] = new $this->class($data);
        }
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
        $query = "INSERT INTO " . get_class($object) . " ( " . $fields . " ) VALUES ( " . $values . " )";
        $this->getDbConn()->execute($query, $vars);

        //print_r($vars);
        //echo $query;
    }


}