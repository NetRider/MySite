<?php
/**
 * classe AbstractDataMapper
 *
 * @package Foundation
 * @author Matteo Polsinelli
 */
abstract class AbstractDataMapper
{
    /**
    *l'oggetto di tipo database
    *
    * @var Database
    */
    protected $adapter;

    /**
	 * Costruttore di AbstractDataMapper
	 *
	 *
	 * @param Database $adapter
	 */
    public function __construct(Database $adapter) {
        $this->adapter = $adapter;
    }

    /**
	 * Ritorna il database $adapter
	 *
	 * @return Database $adapter
	 */
    public function getAdapter() {
        return $this->adapter;
    }

    /**
	 * Cerca elementi all'interno del database e crea un oggetto/un array
	 * di oggetti
	 *
	 */
    public function find($cond = array(), $bind = array(), $op='', $order='', $limit=array(), $joinTable='', $joinBind = array(), $groupBy = array())
    {
        $rows = $this->adapter->select($this->entityTable, $cond, $bind, $op, $order, $limit, $joinTable, $joinBind, $groupBy);
        if(count($rows) == 1)
        {
            //var_dump($rows);
            return $this->createEntity($rows[0]);
        }else if(count($rows) > 1)
        {
            $entities = array();

            foreach($rows as $row)
            {
                array_push($entities, $this->createEntity($row));
            }

            return $entities;
        }else
            return false;
    }

    /**
	 * Cerca elementi all'interno del database e ritorna un array associativo
	 *
	 */
    public function returnAssociativeArray($cond = array(), $bind = array(), $op='', $order='', $limit=array(), $joinTable='', $joinBind = array(), $groupBy = array())
    {
        return $rows = $this->adapter->select($this->entityTable, $cond, $bind, $op, $order, $limit, $joinTable, $joinBind, $groupBy);
    }

    /*
     * Questo metodo deve essere creata dai mappers concreti.
     *
     */
    abstract protected function createEntity($row);
}
