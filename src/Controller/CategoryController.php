<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 23/12/2016
 * Time: 22:18
 */
class CategoryController extends Controller
{
    public function newCategory()
    {
        $this->render("create_category", "Nouveau Categorie");
    }

    public function addCategoryAction()
    {
        if (!empty($_POST["category"])) {
            $category = new Category();
            $category->setDescription($_POST["category"]);
            $id = $this->getModel()->save($category);
            if (!is_null($id)) {
                $this->rededition("article/displayarticles");
            } else {
                $this->rededition("category/addcategoryaction");
            }
        } else {
            Controller::error();
        }

    }
}