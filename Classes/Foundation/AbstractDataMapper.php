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

    public function findByID($id)
    {
        $this->adapter->select($this->entityTable, array('id' => $id));

        if (!$row = $this->adapter->fetch()) {
            return null;
        }

        return $this->createEntity($row);
    }

    public function findAll(array $conditions = array())
    {
        $entities = array();
        $this->adapter->select($this->entityTable, $conditions);
        $rows = $this->adapter->fetchAll;

        if($rows)
        {
            foreach($rows as $row)
            {
                $entities[] = $this->createEntity($row);
            }
        }

        return $entities;
    }
    /*
     * Questa funzione deve essere creata dai mappers concreti!
     * Questo perché conoscono il tipo di modello
     */
    abstract protected function createEntity(array $row);
}