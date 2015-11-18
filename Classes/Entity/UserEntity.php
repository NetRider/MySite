<?php
/**
 * classe UserEntity
 *
 * @package Entity
 * @author Matteo Polsinelli
 */
class UserEntity
{
	/**
	* numero intero identificativo dell'utente gestito da Database.
	*
	* @var int
	*/
	private $id;

	/**
	* username relativo all'utente
	*
	* @var string
	*/
	private $username;

	/**
	* l'email dell'utente
	*
	* @var string
	*/
	private $email;

	/**
	* la password dell'utente
	*
	* @var string
	*/
	private $password;

	/**
	* l'immagine dell'utente
	*
	* @var int
	*/
	private $image;

	/**
	* il ruolo dell'utente
	*
	* @var int
	*/
	private $role;

	/**
	*
	* un array con tutti i permessi relativi all'utente
	*
	* @var array
	*/
	private $permissions = array();


	/**
	 * Costruttore di UserEntity
	 *
	 * Crea un nuovo Utente
	 *
	 * @param string $username
	 * @param string $email
	 * @param string $password
	 * @param string $image
	 * @param string $role
	 */
	public function __construct($username, $email, $password, $image, $role) {

		$this->id = -1;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->image = $image;
		$this->role = $role;
		$this->initPermission();
	}

	/**
	 * metodo getUserName
	 *
	 * ritorna il nome utente
	 *
	 * @return string
	 */
	public function getUserName(){
		return $this->username;
	}

	/**
	 * metodo getEmail
	 *
	 * ritorna l'email dell'utente
	 *
	 * @return string
	 */
	public function getEmail(){
		return $this->email;
	}

	/**
	 * metodo getPassword
	 *
	 * ritorna la password dell'utente
	 *
	 * @return string
	 */
	public function getPassword(){
		return $this->password;
	}

	/**
	 * metodo getImage
	 *
	 * ritorna il path dell'immagine dell'utente
	 *
	 * @return string
	 */
	public function getImage(){
		return $this->image;
	}

	/**
	 * metodo getId
	 *
	 * ritorna l'id del commento gestito dal database
	 *
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * metodo getRole
	 *
	 * ritorna il ruolo dell'utente
	 *
	 * @return string
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * metodo getPermissions
	 *
	 * ritorna l'array di permessi dell'utente
	 *
	 * @return string
	 */
	public function getPermissions()
	{
		return $this->permissions;
	}

	/**
	 * metodo setUsername
	 *
	 * imposta l'username dell'utente
	 *
	 * @param string $username
	 */
	public function setUsername($username){
		$this->username = $username;
	}

	/**
	 * metodo setEmail
	 *
	 * imposta l'email dell'utente
	 *
	 * @param string $email
	 */
	public function setEmail($email){
		$this->email = $email;
	}

	/**
	 * metodo setPassword
	 *
	 * imposta la password dell'utente
	 *
	 * @param string $password
	 */
	public function setPassword($password){
		$this->password = $password;
	}

	/**
	 * metodo setImage
	 *
	 * imposta l'immagine dell'utente
	 *
	 * @param string $image
	 */
	public function setImage($image){
		$this->image=$image;
	}

	/**
	 * metodo setId
	 *
	 * imposta l'id dell'utente gestito dal database
	 *
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * metodo setRole
	 *
	 * imposta il ruolo dell'utente
	 *
	 * @param string $role
	 */
	public function setRole($role) {
		$this->$role = $role;
	}

	/**
	 * metodo initPermission
	 *
	 * imposta tutti i permessi dell'utente a partire dal ruolo
	 */
	protected function initPermission() {
		$databaseAdapter = new Database();
		$aclMapper = new ACLMapper($databaseAdapter);
		$permissions = $aclMapper->getRolePermissions($this->role);

		foreach($permissions as $permission)
		{
			array_push($this->permissions, $permission["perm_desc"]);
		}
	}

	/**
	 * metodo hasPermission
	 *
	 * controlla se l'utente ha un determinato permesso
	 *
	 * @param string $permission
	 */
	public function hasPermission($permission) {
		return in_array($permission, $this->permissions);
	}
}
?>
