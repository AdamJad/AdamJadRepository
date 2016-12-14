<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 11/12/2016
 * Time: 21:51
 */

require_once ROOT . 'core/File.php';

class Article extends Entity
{
    /**
     * L'identifiant de l'article
     *
     * @var int
     */
    private $id;

    /**
     * Le titre de l'article
     *
     * @var string
     */
    private $title;
    /**
     * L'identifiant de la categorie d'article
     *
     * @var string
     */
    private $abstract;


    /**
     * L'identifiant de la categorie d'article
     *
     * @var int
     */
    private $category;


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getContent()
    {
        if (is_null($this->id))
            return null;
        ob_start();
        require_once ROOTVIEW . "resource/article" . $this->id . ".php";
        return ob_get_clean();

    }

    public function getObjectVars()
    {
        return get_object_vars($this);
    }

}