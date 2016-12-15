<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 25/11/2016
 * Time: 03:41
 */
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
        $query = "SELECT * FROM " . $this->class;
        $request = $this->getDbConn()->query($query);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        if (!$data)
            return false;
        $i = 0;
        foreach ($data as $row) {
            $entities[$i] = new $this->class($row);
            $i++;
        }
        return $entities;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM " . $this->class . " WHERE id=:id";
        $vars = array(
            "id" => $id
        );
        $request = $this->getDbConn()->execute($query, $vars);
        $data = $request->fetch(PDO::FETCH_ASSOC);
        if (!$data)
            return false;
        $entity = new $this->class($data);
        return $entity;

        //print_r($vars);
        //echo $query;
    }


    public function findAllBy($params)
    {
        $condition = "";
        $i = 0;
        foreach ($params as $key => $value) {
            $condition .= $key . "=:vars" . $i . " and ";
            $vars["vars" . $i] = $value;
            $i++;
        }
        $condition = substr($condition, 0, -4);
        $query = "SELECT * FROM " . $this->class . " WHERE " . $condition;

        $request = $this->getDbConn()->execute($query, $vars);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        if (!$data)
            return false;
        $i = 0;
        foreach ($data as $row) {
            $entities[$i] = new $this->class($row);
            $i++;
        }
        return $entities;

        //print_r($vars);
        //echo $query;
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
        return $this->getDbConn()->lastInsertId();
        //print_r($vars);
        //echo $query;
    }

    public function delete($object)
    {
        $query = "DELETE FROM " . get_class($object) . " WHERE id=:id";
        $vars = array(
            "id" => $object->getId()
        );
        $this->getDbConn()->execute($query, $vars);

        //print_r($vars);
        //echo $query;
    }

    public function update($object)
    {
        $param = $object->getObjectVars();
        $i = 0;
        $query = "";
        foreach ($param as $key => $value) {
            $query .= $key . "=:vars" . $i . ",";
            $vars["vars" . $i] = $value;
            $i++;
        }
        $query = substr($query, 0, -1);

        $query .= " WHERE  id=:vars" . $i;
        $vars["vars" . $i] = $object->getId();
        $query = "UPDATE " . get_class($object) . " SET " . $query;
        $this->getDbConn()->execute($query, $vars);

        //print_r($vars);
        //echo $query;
    }
}
