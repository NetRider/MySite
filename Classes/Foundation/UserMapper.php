<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 24/05/15
 * Time: 13:01
 */

namespace Foundation;

use Entity\User;

class UserMapper extends AbstractDataMapper
{
    protected $entiyTable = "user";

    public function insert(User $user)
    {
        $user->id = $this->adapter->insert($this->entiyTable, array("nickname"=>$user->getNickname(), "email"=>$user->getEmail(),
                                        "password"=>$user->getPassword()));
        return $user->id;
    }

    public function delete($id) {
        if($id instanceof User) {
            $id = $id->id;
        }
        return $this->adapter->delete($this->entityTable, array("id=$id"));
    }

    public function existUserName($userName) {

    }

    protected function createEntity(array $row){

        return new User($row["nickname"], $row["email"], $row["password"]);

    }
}