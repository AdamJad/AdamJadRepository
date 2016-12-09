<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 25/11/2016
 * Time: 04:25
 */
class UserController extends Controller
{

    public function displayUser()
    {
        $data = $this->getModel("user")->findAll();

        $this->render("users", "Liste des utilisateur", $data);
    }

    public function newUser()
    {
        $this->render("update_create_user", "Nouveau Utilisateur");
    }

    public function updateUser($id)
    {
        $data = $this->getModel("user")->findById($id);
        $this->render("update_create_user", "Modifier utilisateur", $data);
    }

    public function updateUserAction()
    {


    }

    public function addUserAction()
    {
        if (!empty($_POST["userName"]) and !empty($_POST["email"])) {
            $user = new User();
            $user->setEmail($_POST["email"]);
            $user->setUsername($_POST["username"]);
            $this->getModel()->save($user);
            $this->rededition("user/displayUser");
        } else {
            require_once ROOTVIEW . 'views/error/404.php';
        }
    }

    public function authenticate()
    {

        if (!empty($_POST["password"]) && !empty($_POST["username"])) {
            $password = $_POST["password"];
            $username = $_POST["username"];
            $user = $this->getModel("user")->findAllBy(array(
                "username" => $username,
                "password" => $password
            ));
            if ($user != null) {
                $_SESSION['user'] = $user;
                $this->rededition("article/displayArticles");
            } else {
                $data = array(
                    "MessageError" => "Le nom d'utilisateur ou le mot de passe est incorrect"
                );
                $this->render("authenticate", "Autontifation", $data, false);
            }
        } else {
            $this->render("authenticate", "Autontifation", null, false);
        }

    }

}