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
function insert($param) {

    $i = 0;
    $fields = "";
    $values = "";
    foreach ($param as $key => $value) {
        if(!is_null($value)){
            $fields.=$key . ',';
            $values.=":vars" . $i . ",";
            $vars["vars" . $i] = $value;
            $i++;
        }
    }
        $values = substr($values, 0, -1);
        $fields = substr($fields, 0, -1);
        $sql = "INSERT INTO " . "user" . " ( " . $fields . " ) VALUES ( " . $values . " )";
        print_r($vars);
        echo $sql;

}
insert($user->getObjectVars());

function updateBy($param, $field, $val) {
    $i = 0;
    $sql = "";
    foreach ($param as $key => $value) {
        $sql.=$key . "=:vars" . $i . ",";
        $vars["vars" . $i] = $value;
        $i++;
    }
    $sql = substr($sql, 0, -1);

    $sql.=" WHERE " . $field . "=:vars" . $i;
    $vars["vars" . $i] = $val;
    $sql = "UPDATE " . $this->table . " SET " . $sql;
    $req = $this->conect->prepare($sql);
    $req->execute($vars);
}
