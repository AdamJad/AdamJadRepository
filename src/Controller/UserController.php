<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 25/11/2016
 * Time: 04:25
 */
class UserController extends Controller
{

    public function displayUsers()
    {
        $user = unserialize($_SESSION['user']);
        $data = $this->getModel("user")->findAllDifferent(
            array(
                "id" => $user->getId()
            )
        );
        $this->render("users", "Liste des utilisateur", $data);
    }

    public function newUser()
    {
        $this->render("update_create_user", "Nouveau Utilisateur");
    }

    public function deleteUser($id)
    {
        $this->getModel("user")->deleteById($id);
        $this->rededition("user/displayusers");
    }

    public function updateUser($id)
    {
        $data = $this->getModel("user")->findById($id);
        $this->render("update_create_user", "Modifier utilisateur", $data);
    }

    public function updateUserAction()
    {
        if (!empty($_POST["id"]) and !empty($_POST["firstName"]) and !empty($_POST["lastName"]) and !empty($_POST["userName"]) and !empty($_POST["email"]) and !empty($_POST["password"])) {
            $user = new User();
            $user->setId($_POST["id"]);
            $user->setFirstName($_POST["firstName"]);
            $user->setLastName($_POST["lastName"]);
            $user->setUsername($_POST["userName"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setRole($_POST["role"]);
            $this->getModel()->update($user);
            $this->rededition("user/displayUsers");
        } else {
            Controller::error();
        }
    }


    public function addUserAction()
    {
        if (!empty($_POST["firstName"]) and !empty($_POST["lastName"]) and !empty($_POST["userName"]) and !empty($_POST["email"]) and !empty($_POST["password"])) {
            $user = new User();
            $user->setFirstName($_POST["firstName"]);
            $user->setLastName($_POST["lastName"]);
            $user->setUsername($_POST["userName"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $user->setRole($_POST["role"]);
            $this->getModel()->save($user);
            $this->rededition("user/displayUsers");
        } else {
            echo "error";
            Controller::error();
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
                $_SESSION['user'] = serialize($user[0]);
                $get = Acces::defaultUrl($user[0]->getRole());
                if (!$get)
                    Controller::error();
                $this->rededition($get);
            } else {
                $data = array(
                    "MessageError" => "Le nom d'utilisateur ou le mot de passe est incorrect"
                );
                $this->render("authenticate", "Authentification", $data, false);
            }
        } else {
            $this->render("authenticate", "Authentification", null, false);
        }
    }

    public function disconnection()
    {
        session_destroy();
        $this->rededition("user/authenticate");
    }

}