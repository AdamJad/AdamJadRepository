<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 15/12/2016
 * Time: 17:47
 */
class Acces
{
    private static function pregMatch($get, $param)
    {
        foreach ($param as $cm) {
            if ($cm[0] != "#") {
                if ($cm == strtolower($get))
                    return $get;
            } else {
                if (preg_match($cm, $get)) {
                    return $get;
                }
            }
        }
        return FALSE;
    }

    const DefaultUrlAdmin = "user/displayusers";

    const DefaultUrlWritter = "article/displayarticles";

    private static function initApp()
    {
        return array(
            "user/disconnection"
        );
    }

    private static function initAdmin()
    {
        return array_merge(
            array(
                "user/displayusers",
                "user/newuser",
                "user/adduseraction",
                "user/displayusers",
                "#^user\/updateuser\/[0-9]*$#"
            ), Acces::initApp()
        );
    }

    private static function initwritter()
    {
        return array_merge(
            array(
                "#^article\/updatearticle\/[0-9]*$#",
                "article/displayarticles",
                "article/newarticle",
                "article/addarticleaction",
                "article/updatearticleaction",
                "category/newcategory",
                "category/addcategoryaction"
            ), Acces::initApp()
        );
    }

    public static function isAllow($get, $role)
    {
        switch ($role) {
            case User::ADMIN :
                return Acces::pregMatch($get, Acces::initAdmin());
            case User::WRITTER :
                return Acces::pregMatch($get, Acces::initwritter());
            default:
                return FALSE;

        }
    }

    public static function defaultUrl($role)
    {
        switch ($role) {
            case User::ADMIN :
                return Acces::DefaultUrlAdmin;
            case User::WRITTER :
                return Acces::DefaultUrlWritter;
            default:
                return FALSE;
        }
    }
}