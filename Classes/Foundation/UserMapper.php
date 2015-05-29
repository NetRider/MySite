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
    protected $entiyTable = "user";

    public function insert(User $user)
    {
        $this->adapter->insert($this->entiyTable, array("nickname"=>$user->getNickname(), "email"=>$user->getEmail(), "password"=>$user->getPassword()));
    }

    public function existUserName($userName) {


    }

    protected function createEntity(array $row){

        return new User($row["nickname"], $row["email"], $row["password"]);

    }
}