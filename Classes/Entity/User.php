<?php
namespace Entity;

include_once(dirname(__FILE__).'/../Foundation/ACLMapper.php');
include_once(dirname(__FILE__).'/../Foundation/Database.php');

use Foundation\Database;
use Foundation\ACLMapper;

	class User
	{
		private $id;
		private $username;
		private $email;
		private $password;
		private $image;
		private $role;
		private $permissions = array();

		public function __construct($username, $email, $password, $image, $role) {

			$this->id = -1;
			$this->username = $username;
			$this->email = $email;
			$this->password = $password;
			$this->image = $image;
			$this->role = $role;
			$this->initPermission();
		}

		//GET FUNCTIONS

		public function getUserName(){
			return $this->username;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getImage(){
			return $this->image;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getRole()
		{
			return $this->role;
		}

		public function getPermissions()
		{
			return $this->permissions;
		}

		//SET FUNCTIONS

		public function setNickname($nickname){
			$this->nickname = $nickname;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function setImage($image){
			$this->image=$image;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function setRole($role) {
			$this->$role = $role;
		}

		protected function initPermission() {
			$databaseAdapter = new Database();
			$aclMapper = new ACLMapper($databaseAdapter);
			$permissions = $aclMapper->getRolePermissions($this->role);

			foreach($permissions as $permission)
			{
				array_push($this->permissions, $permission["perm_desc"]);
			}
    	}

		// check if user has a specific privilege
		public function hasPermission($permission) {
			return in_array($permission, $this->permissions);
		}
	}
?>
