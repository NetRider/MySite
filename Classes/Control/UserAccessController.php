<?php

namespace Control;

include_once(dirname(__FILE__).'/../Utility/Session.php');
include_once(dirname(__FILE__).'/../Utility/Singleton.php');
include_once(dirname(__FILE__).'/../Foundation/UserMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');

use Control\Controller;
use View\View;
use Utility\Singleton;
use Foundation\Database;
use Foundation\UserMapper;
use Control\Session;

class UserAccessController extends Controller {

    public function executeTask()
    {
        switch ($this->view->getTask())
        {
            case 'login':
                return $this->login();
            break;

            case 'logout':
                return $this->logout();
            break;

            case "updateUserRole":
                return $this->updateUserRole();
            break;

            case "removeUser":
                return $this->removeUser();
            break;

            case "updateUser":
                return $this->updateUser();
            break;
        }
    }

    public function login()
    {
        $username = $this->view->getUsername();
        $password = $this->view->getUserPassword();
        $userData = $this->userAuthentication($username, $password);

        if($userData) {
            $session = Singleton::getInstance("\Control\Session");
            $session->login($username);
            return "true";
        }else {
            return "false";
        }
    }

    public function logout()
    {
        $session = Singleton::getInstance("\Control\Session");
        $logout = $this->view->logout();
        $session->logout();
        return $logout;
    }

    private function userAuthentication($username, $password)
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $userData = $userMapper->validateLogin($username, $password);
        if($userData)
        {
            return $userData;
        }else
        {
            return false;
        }
    }

    private function updateUserRole()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $userData = $userMapper->updateUserRole($this->view->getUserIdForUpdate(), $this->view->getUserRoleToUpdate());
        if($userData)
        {
            return "true";
        }else
        {
            return "false";
        }
    }

    private function removeUser()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $userImage = $userMapper->getUserImage($this->view->userToRemove());

        if($userImage[0]["profileImage"] != "Data/profile_images/default_profile_image.gif") {
            unlink($userImage[0]["profileImage"]);
        }

        $userData = $userMapper->removeUser($this->view->userToRemove());
        if($userData)
        {
            return "true";
        }else
        {
            return "false";
        }
    }

    private function updateUser()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $session = Singleton::getInstance("\Control\Session");

        if($this->view->getUsername() == "")
            $username = $session->getUsername();
        else
        {
            $username = $this->view->getUsername();
            $session->login($username);
        }


        if($this->view->getUserEmail() == "")
            $email = $session->getUserEmail();
        else
            $email = $this->view->getUserEmail();

        if($this->view->getUserPassword() == "")
            $password = $session->getUserPassword();
        else
            $password = $this->view->getUserPassword();


        $image = $this->view->getUpdateImage();
        if($image == "")

            $image = $session->getUserImage();
        else
        {
            if($session->getUserImage() != "Data/profile_images/default_profile_image.gif")
            {
                unlink($session->getUserImage());
            }
        }

        $userData = $userMapper->updateUser($session->getUserId(), $username, $email, $image, $password);

        if($userData)
            return "true";
        else
            return "false";
    }
}
