<?php
/**
 * classe Session
 *
 * @package Utility
 * @author Matteo Polsinelli
 */
class Session {
    /**
	* durata del cookie
	*
	* @var string
	*/
    private $lifetime;

    /**
	* utente loggato
	*
	* @var User
	*/
    private $user;

    /**
	 * Costruttore di Session
	 *
	 * Crea una sessione e l'utente relativo se loggato
	 *
	 */
    public function __construct()
    {
        $this->lifetime = 60*60*24*30; // 30 days
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
     *  Aggiorna i cookie.
     *
     * Questo metodo aggiorna i cookie quando è attivato rememberMe
     */
    private function updateSessionCookie()
    {
        if($this->get("rememberMe"))
        {
            setcookie(session_name(), session_id(), time()+$this->lifetime, "/");
        }
        else
            setcookie(session_name(), session_id(), 0, "/"); // expires on browser close
    }

    /**
     * Metodo set
     *
     * Associa un valore ad uan chiave in $_SESSION
     * @param string
     * @param string
     */
    public function set($key, $value)
    {
        $_SESSION[$key]=$value;
    }

    /**
     * Metodo get
     *
     * @param string
     * @return mixed
     */
    public function get($key)
    {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return false;
    }

    /**
     * Metodo setRememberMe
     *
     * @param bool $value
     */
    public function setRememberMe($value)
    {
        $_SESSION["rememberMe"]=$value;
        $this->updateSessionCookie();
    }

    /**
     * Metodo getUserId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user->getId();
    }

    /**
     * Metodo getUserImage
     *
     * @return string
     */
    public function getUserImage()
    {
        return $this->user->getImage();
    }

    /**
     * Metodo getUserEmail
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->user->getEmail();
    }

    /**
     * Metodo getUsername
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->user->getUsername();
    }

    /**
     * Metodo getPassword
     *
     * @return string
     */
    public function getUserPassword()
    {
        return $this->user->getPassword();
    }

    /**
     * Metodo checkPermission
     *
     * Controllo se l'utente ha un determinato permesso
     *
     * @param string
     * @return string
     */
    public function checkPermission($privilage)
    {
        return $this->user->hasPermission($privilage);
    }

    /**
     * Metodo getAllPermissions
     *
     * Ritorna tutti i permessi dell'utente
     *
     * @return array
     */
    public function getAllPermissions()
    {
        return $this->user->getPermissions();
    }

    /**
     * Metodo logut
     */
    public function logout()
    {
        //clear all session variables
        session_unset();
        session_destroy();

        $this->updateSessionCookie();
    }

    /**
     * Metodo login
     *
     * @param $username
     * @param $remeberMe
     */
    public function login($username, $rememberMe)
    {
        $this->set("username",$username);
        if($rememberMe)
            $this->set("rememberMe", $rememberMe);
    }

    public function updateUser($username)
    {
        $this->set("username", $username);
    }

    /**
     * Metodo userIsLogged
     *
     *@return bool;
     */
    public function userIsLogged()
    {
        if($this->get("username"))
            return true;
        else
            return false;
    }
}
