<?php

class UserMapper extends AbstractDataMapper {
    protected $entityTable = "user";

    public function insert(UserEntity $user)
    {
        return $this->adapter->insert($this->entityTable, array("username"=>$user->getUserName(), "profileImage"=>$user->getImage(), "email"=>$user->getEmail(), "password"=>$user->getPassword(), "role"=>$user->getRole()));
    }

    public function validateLogin($name, $password)
    {
        error_log("sono dentro a validateLogin");

        if($this->find(array("username"=>$name, "password"=>$password)))
            return true;
        else
            return false;
    }

    public function getAllUsers()
    {
        return $this->returnAssociativeArray(array("role.role_name"), array("user.id", "user.username", "user.email", "user.profileImage", "role.role_name"), "", "", "", "role", array("user"=>"role", "role"=>"id"));
    }

    public function getUsersDash()
    {
        return $this->returnAssociativeArray(array("role.role_name"=>"administrator"), array("user.id", "user.username", "user.email", "user.profileImage", "role.role_name"), "<>", "", "", "role", array("user"=>"role", "role"=>"id"));
    }

    public function updateUserRole($userId, $userRole)
    {
        return $this->adapter->update($this->entityTable, array("role"=>$userRole), array("id"=>$userId));
    }

    public function existUserName($username) {
        $found = $this->find(array("username"=>$username));
        if($found)
          return true;
        else
          return false;
    }

    public function getUserImage($username) {
        return $this->returnAssociativeArray(array("username"=>$username), array("profileImage"));
    }

    public function existUserEmail($email) {
        $found = $this->find(array("email"=>$email));
        if($found)
          return true;
        else
          return false;
    }

    public function getUserById($id)
    {
        $found = $this->find(array("id"=>$id));
        if($found)
            return $found;
        else
            return false;
    }

    public function getUserByUsername($username)
    {
        $found = $this->find(array("username"=>$username));
        if($found)
            return $found;
        else
            return false;
    }

    public function removeUser($username)
    {
        return $this->adapter->delete($this->entityTable, array("username"=>$username));
    }

    public function getNumberOfUsers()
    {
        return $this->returnAssociativeArray(array(), "COUNT");
    }

    public function updateUser($userId, $username, $email, $image, $password)
    {
        return $this->adapter->update($this->entityTable, array("username"=>$username, "password"=>$password, "email"=>$email, "profileImage"=>$image), array("id"=>$userId));
    }

    protected function createEntity($row) {
        $user = new UserEntity($row["username"], $row["email"], $row["password"], $row["profileImage"], $row["role"]);
        $user->setId($row["id"]);
        return $user;
    }
}
