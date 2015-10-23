<?php
namespace Control;

include_once(dirname(__FILE__).'/../Entity/User.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');

use Entity\User;
use Foundation\Database;
use Foundation\UserMapper;

class Session {
    private $lifetime;
    private $user;

    public function __construct()
    {
        $this->lifetime = 60*60*24*30; // 30 days
        //$this->lifetime = 10; //seconds
        session_start();

        if($this->userIsLogged())
        {
            $databaseAdapter = new Database();
			$userMapper = new UserMapper($databaseAdapter);
            $this->user = $userMapper->getUserByUsername($_SESSION["username"]);
        }

        $this->updateSessionCookie();
    }

    /**
     *  Updates the cookie.
     *
     *  When the "rememberMe" session variable is changed, this method should be called to
     *  update the cookie.
     */
    private function updateSessionCookie()
    {
        if($this->get("rememberMe"))
        {
            /* Overwriting of the cookie created by session_start().*/
            setcookie(session_name(), session_id(), time()+$this->lifetime, "/");
            /*
             *
            *
            * Example : cookie with a lifetime of 30 minutes.
            * -> at 17:00 cookie created (expire date : someday at 17:30)
            * -> at 17:05 page refreshed (expire date : someday at 17:35).
            *    without setcookie() the expiration date would not be changed
            */
        }
        else
            setcookie(session_name(), session_id(), 0, "/"); // expires on browser close
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

    /**
     * Sets the desired behaviour of the session.
     *
     * If $value is true the session will last $this->lifetime, otherwise it will last only until browser quit.
     *
     * @param bool $value
     */
    public function setRememberMe($value)
    {
        $_SESSION["rememberMe"]=$value;
        $this->updateSessionCookie();
    }

    public function getUserId()
    {
        return $this->user->getId();
    }

    public function getUserImage()
    {
        return $this->user->getImage();
    }

    public function getUserName()
    {
        return $this->user->getUsername();
    }

    public function checkPermission($privilage)
    {
        return $this->user->hasPermission($privilage);
    }

    public function getAllPermissions()
    {
        return $this->user->getPermissions();
    }

    public function logout()
    {
        //clear all session variables
        session_unset();
        session_destroy();

        $this->updateSessionCookie();
    }

    public function login($username)
    {
        $this->set("username",$username);
    }

    public function userIsLogged()
    {
        if($this->get("username"))
            return true;
        else
            return false;
    }
}
