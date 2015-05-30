<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 30/05/15
 * Time: 11:54
 */

namespace Control;


class Session {

    private $lifetime;

    public function __construct() {

        $this->lifetime = 60*60*24*30; // 30 days
        //$this->lifetime = 10; //seconds
        session_start();
    }

    public function isLoggedIn()
    {
        $loggedIn = false;

        if(isset($_SESSION["username"]) && isset($_SESSION["password"]))
        {
            $username = $_SESSION["username"];
            $pass = $_SESSION["password"];
            if ($this->validate($username, $pass))
                $loggedIn = true;
        }

        return $loggedIn;
    }

    public function set($key, $value)
    {
        $_SESSION[$key]=$value;
    }

    public function get($key)
    {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return false;
    }
}