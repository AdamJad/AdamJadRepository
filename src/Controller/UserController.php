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



    public function test()
    {

    }

    public function authenticate()
    {

        if (!empty($_POST["password"]) && !empty($_POST["username"])) {
            $password = $_POST["password"];
            $username = $_POST["username"];
            $user = $this->getModel("user")->findAllBy(array(
                "username" => $password,
                "password" => $username
            ));
            if (!$user) {
                $_SESSION['user'] = $user;
                $this->rededition("article/displayArticles");
            } else {
                $data = array(
                    "getMessageError" => "Le nom d'utilisateur ou le mot de passe est incorrect"
                );
                $this->render("authenticate", "Autontifation", $data, false);
            }
        } else {
            $this->render("authenticate", "Autontifation", null, false);
            //$_SESSION["errors"] = "Veuillez remplir tout les champs";
            //header("location:../login");
        }

    }

}