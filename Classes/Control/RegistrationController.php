<?php
/**
 * Registration Controller File
 *
 * Questo file contiene il registration controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */
class RegistrationController extends Controller {

	/**
	 * Smista le richieste in arrivo dalla Registration View.
	 */
	public function executeTask()
	{
		switch ($this->view->getTask())
		{

			case 'addNewUser':
				return $this->addNewUser();
			break;

			case 'checkUsername':
				return $this->checkUsername();
			break;

			case 'checkEmail':
				return $this->checkEmail();
			break;

			case 'getRegistrationPage':
				return $this->getRegistrationPage();
			break;
		}
	}

	/**
	 * Memorizza un nuovo utente nel database
	 *
	 * Istanzia un utente con i dati in upload e prova ad inserirlo nel database
	 *
     */
	private function addNewUser()
	{
		$databaseAdapter = new Database();
		$userMapper = new UserMapper($databaseAdapter);
		$image = $this->Upload();
		if($image)
        {
			$user = new UserEntity($this->view->getUsername(), $this->view->getEmail(), $this->view->getPassword(), $image, 2);
			$this->view->responseAjaxCall($userMapper->insert($user));
		}
		else {
			$this->view->responseAjaxCall(false);
		}

	}

	/**
	 * Controlla se l'indirizzo email è già presente nel database
	 *
     */
	private function checkEmail()
	{
		$databaseAdapter = new Database();
		$userMapper = new UserMapper($databaseAdapter);
		$emailToCheck = $this->view->getEmailToCheck();
		$found = $userMapper->existUserEmail($emailToCheck);

		$session = Singleton::getInstance("Session");

		if($session->userIsLogged() && $emailToCheck == $session->getUserEmail()) {
			$this->view->responseAjaxCall("true");
		}else {
			if($found)
				$this->view->responseAjaxCall("false");
			else
				$this->view->responseAjaxCall("true");
		}
	}

	/**
	 * Controlla se l'usermail è già presente nel database
     */
	private function checkUsername()
	{
		$databaseAdapter = new Database();
		$userMapper = new UserMapper($databaseAdapter);
		$usernameToCheck = $this->view->getUsernameToCheck();
		$found = $userMapper->existUserName($usernameToCheck);

		$session = Singleton::getInstance("Session");

		if($session->userIsLogged() && $usernameToCheck == $session->getUsername()) {
			$this->view->responseAjaxCall("true");
		}else {
			if($found)
				$this->view->responseAjaxCall("false");
			else
				$this->view->responseAjaxCall("true");
		}
	}

	/**
     * Crea la pagina per la registrazione
     *
     * @return string Ritorna il template costruito con smarty
     */
	private function getRegistrationPage()
	{
		$this->view->setTemplate('registrationForm');
		return $this->view->getContent();
	}

	/**
     * Gestisce upload immagine utente
     *
     * @return string Ritorna il path dell'immagine se tutto è andato bene
     */
	private function Upload()
    {
        $imageUploaded = $this->view->getProfileImage();
        $extensions = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        $type = $imageUploaded['type'];
        $name = $imageUploaded['name'];
        $size = $imageUploaded['size'];

        if(is_uploaded_file($imageUploaded['tmp_name']))
		{
            if($size <= 65536 && in_array($type, $extensions))
            {
                $image = basename($name);
                $target_file = "Data/profile_images/" . date('o-m-d H:i:s') . $image;
                move_uploaded_file($imageUploaded['tmp_name'], $target_file);
    			return $target_file;
            }
            else {
                return false;
            }
        }else
		{
			return "Data/profile_images/default_profile_image.gif";
		}
    }
}
