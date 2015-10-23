<?php

namespace Foundation;
require_once 'AbstractDataMapper.php';

use Entity\Role;

class ACLMapper extends AbstractDataMapper {

    public function insert(Role $role)
    {
        return $this->adapter->insert($this->entityTable, array("nickname"=>$user->getNickname(), "image"=>$user->getImage(), "email"=>$user->getEmail(), "password"=>$user->getPassword()));
    }

	public function getRolePermissions($roleId)
	{
		$this->entityTable = "permissions";
		return $this->returnAssociativeArray(array("role_perm.role_id"=>$roleId), array("permissions.perm_desc"), "", "", "", "role_perm", array("role_perm"=>"perm_id", "permissions"=>"id"));
	}

    public function getAllRoles()
	{
		$this->entityTable = "role";
		return $this->returnAssociativeArray(array(), array("id", "role_name"));
    }

    protected function createEntity($row) {
        /* Not required yet*/
    }
}
