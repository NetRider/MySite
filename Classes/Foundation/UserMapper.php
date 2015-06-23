<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 24/05/15
 * Time: 13:01
 */

namespace Foundation;
require_once 'AbstractDataMapper.php';

use Entity\User;

class UserMapper extends AbstractDataMapper {
    protected $entityTable = "user";

    public function insert(User $user)
    {
        return $this->adapter->insert($this->entityTable, array("nickname"=>$user->getNickname(), "image"=>$user->getImage(), "email"=>$user->getEmail(), "password"=>$user->getPassword()));
    }

    public function validateLogin($name, $password)
    {
        $cond = array("nickname"=>$name, "password"=>$password);
        $found = $this->find(array(), $cond, null);

        if($found)
          return $found;
        else
          return false;
    }

    public function existUserName($userName) {


    }

    protected function createEntity(array $row){
        $user = new User($row["nickname"], $row["email"], $row["password"], $row["image"]);
        $user->setId($row['id']);
        return $user;

    }
}
