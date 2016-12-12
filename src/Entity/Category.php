<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 11/12/2016
 * Time: 22:04
 */
class Category extends Entity
{
    /**
     * L'identifiant de la categorie
     *
     * @var int
     */
    private $id;

    /**
     * La description de categorie
     *
     * @var string
     */
    private $description;

    public function __construct($data = array())
    {
        if (!is_null($data))
            $this->arrayToObject($data);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getObjectVars()
    {
        return get_object_vars($this);
    }

}