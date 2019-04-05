<?php

use Cake\Datasource\ConnectionManager;

use Gelato\Add\SQLCommonRespository;

class SQLTodoRepository extends SQLCommonRespository
{
    public function clean()
    {
        $this->withConnection(
            function ($connection) {
                $connection->execute('TRUNCATE TABLE todos');
            }
        );
    }

    public function hasOne($name)
    {
        return $this->withConnection(
            function ($connection) use($name) {
                $results = $connection->execute('SELECT * FROM todos WHERE name = :name', ['name' => $name])->fetchAll('assoc');
                return sizeof($results) == 1;
            }
        );
    }
}
