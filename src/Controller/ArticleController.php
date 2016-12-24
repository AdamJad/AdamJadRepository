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
    }

    public function displayArticle($id)
    {
        $data = $this->getModel("article")->findById($id);
        if (!$data)
            Controller::error();
        $this->render("article", $data->getTitle(), $data);
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
        $this->render("create_article", "Nouveau des articles", $data);
    }

    public function updateArticle($id)
    {
        $data = array(
            "article" => $this->getModel("article")->findById($id),
            "categories" => $this->getModel("category")->findAll(),
            "js" => array(
                "js/tinymce/tinymce.min",
                "js/tinymce/editor"
            )
        );
        $this->render("update_article", "Nouveau des articles", $data);
    }


    public function addArticleAction()
    {
        if (!empty($_POST["title"]) and !empty($_POST["abstract"]) and !empty($_POST["content"]) and !empty($_POST["category"])) {
            $article = new Article();
            $article->setTitle($_POST["title"]);
            $article->setAbstract($_POST["abstract"]);
            $article->setCategory($_POST["category"]);
            $id = $this->getModel()->save($article);
            if (!is_null($id)) {
                File::createFile(ROOTVIEW . "resource/article" . $id . ".php", $_POST["content"]);
                $this->rededition("article/displayarticles");
            } else {
                $this->rededition("article/newarticle");
            }
        } else {
            $this->rededition("article/newarticle");
        }
    }

    public function updateArticleAction()
    {
        if (!empty($_POST["id"]) and !empty($_POST["title"]) and !empty($_POST["abstract"]) and !empty($_POST["content"]) and !empty($_POST["category"])) {
            $article = $this->getModel("article")->findById($_POST["id"]);
            $article->setTitle($_POST["title"]);
            $article->setAbstract($_POST["abstract"]);
            $article->setCategory($_POST["category"]);
            $this->getModel()->update($article);
            File::createFile(ROOTVIEW . "resource/article" . $_POST["id"] . ".php", $_POST["content"]);
            $this->rededition("article/displayarticles");
        } else {
            $this->rededition("article/newarticle");
        }

    }
}