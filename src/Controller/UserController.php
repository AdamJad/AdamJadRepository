<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 25/11/2016
 * Time: 04:25
 */
require_once "C:\\xampp\\htdocs\\AdamJadRepository\\src\\Core\\Controller.php";

class UserController extends Controller
{
    public function saveUser()
    {
        $user = new User();
        $user->setFirstName("Mohammed");
        $user->setLastName("EL HAMMOUMI");
        $user->setEmail("diimedo@gmail.com");
        $user->setUsername("dimedo");
        $user->setPassword("test");
        $user->setRole(User::WRITTER);
        $this->getModel()->save($user);
    }

    public function displayUser()
    {
        $user = $this->getModel("User")->findById(8);
        $user->setEmail("test@gmail.com");
        $this->getModel()->update($user);
    }
}