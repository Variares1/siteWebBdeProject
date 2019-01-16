<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 16/01/2019
 * Time: 14:25
 */

abstract class Model
{
    private static $bdd;

    // INSTANCE DB CONNEXION
    private static function setBdd(){
        self::$bdd = new PDO('mysql:host=localhost;dbname=bde;charset=utf8','root','');
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // GET DB CONNEXION
    protected function getBdd(){
        if(self::$bdd == null){
            self::setBdd();
            return self::$bdd;
        }
    }
}