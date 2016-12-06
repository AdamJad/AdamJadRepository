<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 06/12/2016
 * Time: 01:33
 */
class ArticleController extends Controller
{
    public function displayArticles()
    {
        $data = array(
            "title" => "ici le titre",
            "content" => "ici le content"

        );
        $this->render("articles", "Liste des article", $data);
        //echo "display articles";
    }
}