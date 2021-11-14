<?php
require 'db.php';

class user extends db{
    function getUser(){
        $sql=self::$connection->prepare("SELECT `username`, `password` FROM `user`");
        $sql->execute();
        $item=array();
        $item=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}