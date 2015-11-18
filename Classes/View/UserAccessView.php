<?php
/**
 * UserAccess View File
 *
 * Questo file contiene il Registration View
 *
 * @package View
 * @author Matteo Polsinelli
 */
class UserAccessView extends View {

	/**
	 * metodo getTask
	 *
	 * @return string con il task per il controller - false altrimenti
	 */
	public function getTask()
	{
		if(isset($_REQUEST['task']))
			return $_REQUEST['task'];
		else
			return false;
	}

	/**
	 * metodo getUsername
	 *
	 * @return string ritorna il valore associato a "username" dentro $_REQUEST
	 */
	public function getUsername()
	{
		return $this->getRequest('username');
	}

	/**
	 * metodo getUserId
	 *
	 * @return string ritorna il valore associato a "userid" dentro $_REQUEST
	 */
	public function getUserId()
	{
		return $this->getRequest('userid');
	}

	/**
	 * metodo getUserPassword
	 *
	 * @return string ritorna il valore associato a "password" dentro $_REQUEST
	 */
	public function getUserPassword()
	{
		return $this->getRequest('password');
	}

	/**
	 * metodo getUserEmail
	 *
	 * @return string ritorna il valore associato a "email" dentro $_REQUEST
	 */
	public function getUserEmail()
	{
		return $this->getRequest('email');
	}

	/**
	 * metodo getUserRoleToUpdate
	 *
	 * @return string ritorna il valore associato a "idRole" dentro $_REQUEST
	 */
	public function getUserRoleToUpdate()
	{
		return $this->getRequest("idRole");
	}

	/**
	 * metodo getUserIdForUpdate
	 *
	 * @return string ritorna il valore associato a "idUser" dentro $_REQUEST
	 */
	public function getUserIdForUpdate()
	{
		return $this->getRequest("idUser");
	}

	/**
	 * metodo getUserToRemove
	 *
	 * @return string ritorna il valore associato a "userToRemove" dentro $_REQUEST
	 */
	public function userToRemove()
	{
		return $this->getRequest("userToRemove");
	}

	/**
	 * metodo getUpdateImage
	 *
	 * @return string ritorna il valore associato a "image" dentro $_FILES
	 */
	public function getUpdateImage()
	{
		return $_FILES["image"];
	}

	/**
	 * metodo getRememberMe
	 *
	 * @return string ritorna il valore associato a "rememberMe" dentro $_REQUEST
	 */
  	public function getRememberMe()
	{
		return $this->getRequest("rememberMe");
	}

	/**
	 * metodo login
	 *
	 * @return string Ritorna il template costruito con smarty
	 */
	public function login()
	{
		$session = Singleton::getInstance("Session");
		$this->assign('username', $session->get('username'));
		return $this->fetch('correctLogin.tpl');
	}

	/**
	 * metodo logut
	 *
	 * @return string Ritorna il template costruito con smarty
	 */
	public function logout()
	{
		$session = Singleton::getInstance("Session");
		$this->assign('username', $session->get('username'));
		return $this->fetch('correctLogout.tpl');
	}
}
