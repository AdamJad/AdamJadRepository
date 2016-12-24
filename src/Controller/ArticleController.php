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
    public function displayAllArticles()
    {
        $data = array(
            "articles" => $this->getModel("article")->findAll(),
            "categories" => $this->getModel("category")->findAll()
        );

        $this->render("all_articles", "Liste des articles", $data, false);
    }

    public function displayArticlesBy($category)
    {

        $data = array(
            "articles" => $this->getModel("article")->findAllBy(array(
                "category" => $category
            )),
            "categories" => $this->getModel("category")->findAll(),
            "isAll" => $category
        );

        $this->render("all_articles", "Liste des articles", $data, false);
    }

    public function displayArticles()
    {
        $user = unserialize($_SESSION['user']);
        $data = $this->getModel("article")->findAllBy(array(
            "user" => $user->getId()

        ));
        $this->render("articles", "Liste des articles", $data);
    }

    public function displayArticle($id)
    {
        $data = $this->getModel("article")->findById($id);
        if (!$data)
            Controller::error();
        $this->render("article", $data->getTitle(), $data, False);
    }

    public function deleteArticle($id)
    {
        $this->getModel("article")->deleteById($id);
        $url = ROOTVIEW . "resource/article" . $id . ".php";
        if (is_file($url)) {
            unlink($url);
        }
        $this->rededition("user/displayarticles");
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
            $user = unserialize($_SESSION['user']);
            $article->setUser($user->getId());
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