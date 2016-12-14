<?php

/**
 * Created by PhpStorm.
 * User: Med
 * Date: 13/12/2016
 * Time: 11:09
 */
class File
{

    static function createFile($url, $str)
    {
        if (is_file($url)) {
            unlink($url);
        }
        if (!$fp = fopen($url, "a+")) {
            return FALSE;
            exit;
        } else {
            fputs($fp, $str);
            fclose($fp);
        }
    }
}