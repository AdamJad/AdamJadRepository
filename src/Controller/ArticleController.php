<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 06/12/2016
 * Time: 01:33
 */

require_once ROOT . 'Entity/Category.php';

class ArticleController extends Controller
{
    public function displayArticles()
    {
        $data = $this->getModel("article")->findAll();
        $this->render("articles", "Liste des articles", $data);
        //echo "display articles";
    }

    public function newArticle()
    {

        $data = array(
            "categories" => $this->getModel("category")->findAll(),
            "js" => array(
                "js/tinymce/tinymce.min",
                "js/tinymce/editor"
            )
        );
        $this->render("update_create_article", "Nouveau des articles", $data);
    }
}