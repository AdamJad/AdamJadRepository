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
        $this->render("articles", "Liste des article");
        //echo "display articles";
    }
}