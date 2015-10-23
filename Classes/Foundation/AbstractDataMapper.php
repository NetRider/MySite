<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 24/05/15
 * Time: 12:32
 */

namespace Foundation;

abstract class AbstractDataMapper
{
    protected $adapter;
    protected $entityTable;

    public function __construct(Database $adapter) {
        $this->adapter = $adapter;
    }

    public function getAdapter() {
        return $this->adapter;
    }

    public function find($cond = array(), $bind = array(), $op='', $order='', $limit='', $joinTable='', $joinBind = array())
    {
        $rows = $this->adapter->select($this->entityTable, $cond, $bind, $op, $order, $limit, $joinTable, $joinBind);
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

    public function returnAssociativeArray($cond = array(), $bind = array(), $op='', $order='', $limit='', $joinTable='', $joinBind = array())
    {
        return $rows = $this->adapter->select($this->entityTable, $cond, $bind, $op, $order, $limit, $joinTable, $joinBind);
    }

    /*
     * Questa funzione deve essere creata dai mappers concreti!
     * Questo perché conoscono il tipo di modello
     */
    abstract protected function createEntity($row);
}
