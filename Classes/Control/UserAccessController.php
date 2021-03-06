<?php
/**
 * UserAccess Controller File
 *
 * Questo file contiene il comment controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */
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

    /**
     * Effettua il login dell'utente nel caso in cui i dati inseriti
     * siano corretti.
     */
    public function login()
    {
        error_log("sono dentro a login");
        $username = $this->view->getUsername();
        $password = $this->view->getUserPassword();
        $rememberMe = $this->view->getRememberMe();
        error_log($rememberMe);
        if($this->userAuthentication($username, $password)) {
            $session = Singleton::getInstance("Session");
            $session->login($username, $rememberMe);
            $this->view->responseAjaxCall(true);

        }else {
            $this->view->responseAjaxCall(false);
        }
    }

    /**
     * Esegue il logout dell'utente
     *
     * @return string Ritorna il template costruito con smarty
     */
    public function logout()
    {
        $session = Singleton::getInstance("Session");
        $logout = $this->view->logout();
        $session->logout();
        return $logout;
    }

    /**
     * Controlla se le credenziali di accesso corrispondono a quelle
     * di un utente nel database
     */
    private function userAuthentication($username, $password)
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        if($userMapper->validateLogin($username, $password))
            return true;
        else
            return false;
    }

    /**
     * Aggiorna il ruolo di un utente e salva le modifiche nel database
     *
     */
    private function updateUserRole()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $this->view->responseAjaxCall($userMapper->updateUserRole($this->view->getUserIdForUpdate(), $this->view->getUserRoleToUpdate()));
    }

    /**
     * Rimuove un utente dal database
     *
     */
    private function removeUser()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $userImage = $userMapper->getUserImage($this->view->userToRemove());

        if($userImage[0]["profileImage"] != "Data/profile_images/default_profile_image.gif") {
            unlink($userImage[0]["profileImage"]);
        }

        $this->view->responseAjaxCall($userMapper->removeUser($this->view->userToRemove()));
    }
    /**
     * Esegue l'update dei dati dell'utente
     */
    private function updateUser()
    {
        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $session = Singleton::getInstance("Session");

        if($this->view->getUsername() == "")
            $username = $session->getUsername();
        else
        {
            $username = $this->view->getUsername();
        }

        if($this->view->getUserEmail() == "")
            $email = $session->getUserEmail();
        else
            $email = $this->view->getUserEmail();

        if($this->view->getUserPassword() == "")
            $password = $session->getUserPassword();
        else
            $password = $this->view->getUserPassword();

        $image = $this->Upload();

        if($image == "")
            $image = $session->getUserImage();


        if($image != $session->getUserImage() && $image != "Data/profile_images/default_profile_image.gif")
                unlink($session->getUserImage());

        if($userMapper->updateUser($session->getUserId(), $username, $email, $image, $password))
        {
            $session->updateUser($username);
            $this->view->responseAjaxCall(true);
        }else {
            $this->view->responseAjaxCall(false);
        }
    }


    private function Upload()
    {
        $imageUploaded = $this->view->getUpdateImage();
        $extensions = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        $type = $imageUploaded['type'];
        $name = $imageUploaded['name'];
        $size = $imageUploaded['size'];

        if(is_uploaded_file($imageUploaded['tmp_name']))
		{
            if($size <= 65536 && in_array($type, $extensions))
            {
                $image = basename($name);
                $target_file = "Data/profile_images/". date('o-m-d H:i:s') . $image;
                move_uploaded_file($imageUploaded['tmp_name'], $target_file);
    			return $target_file;
            }
            else {
                return false;
            }
        }else
		{
			return "";
		}
    }
}
