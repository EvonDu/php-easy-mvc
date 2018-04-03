<?php
namespace core;

class Identity{
    static $conf = array();

    static function init($conf){
        self::$conf = $conf;
        session_start();
    }

    static function user(){
        if(isset($_SESSION[self::$conf["session"]]))
            return $_SESSION[self::$conf["session"]];
        else
            return null;
    }

    static function isGuest(){
        if(isset($_SESSION[self::$conf["session"]]))
            return false;
        else
            return true;
    }

    static function login($user){
        $_SESSION[self::$conf["session"]] = $user;
    }

    static function logout(){
        unset($_SESSION[self::$conf["session"]]);
    }
}