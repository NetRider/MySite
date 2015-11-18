<?php
/**
 * classe ACLMapper
 *
 * @package Foundation
 * @author Matteo Polsinelli
 */
class ACLMapper extends AbstractDataMapper {

    /**
     * Ritorna tutti i permessi relativi ad un id di un ruolo
     *
     * @return array
     */
	public function getRolePermissions($roleId)
	{
		$this->entityTable = "permissions";
		return $this->returnAssociativeArray(array("role_perm.role_id"=>$roleId), array("permissions.perm_desc"), "", "", "", "role_perm", array("role_perm"=>"perm_id", "permissions"=>"id"));
	}

    /**
     * Ritorna tutti i ruoli presenti nel database
     *
     * @return array
     */
    public function getAllRoles()
	{
		$this->entityTable = "role";
		return $this->returnAssociativeArray(array(), array("id", "role_name"));
    }

    /**
     * Ritorna tutti i ruoli eccetto quello dell'amministratore
     *
     * @return array
     */
    public function getRolesDash()
	{
		$this->entityTable = "role";
		return $this->returnAssociativeArray(array("role_name"=>"administrator"), array("id", "role_name"), "<>");
    }

    protected function createEntity($row) {
        /* Not required yet*/
    }
}
