<?php

/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 26/11/2016
 * Time: 04:44
 */
class Entity
{

    protected function arrayToObject(array $data) {
        foreach($data as $key => $value) {
                $method = "set".ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function getObjectVars()
    {
        return get_object_vars($this);
    }
}