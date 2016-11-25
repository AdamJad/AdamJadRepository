<?php

/**
 * Created by PhpStorm.
 * User: Adam
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
     * Model constructor.
     * @param DbConn $dbConn
     */
    public function __construct(DbConn $dbConn)
    {
        $this->dbConn = DbConn::getInstance();
    }

    /**
     * @return DbConn
     */
    public function getDbConn()
    {
        return $this->dbConn;
    }


}