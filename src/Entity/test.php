<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 25/11/2016
 * Time: 02:04
 */

require_once "User.php";
$user = new User();
$user->setFirstName("med");
$user->setLastName("EL HAMMOUMI").
$user->setEmail("diimedo@gmail.com");
$user->setFirstName("dimedo");
print_r($user->getObjectVars());

