<?php

use Cake\Datasource\ConnectionManager;

class SQLTodoRepository {
    public function __construct() {
        $this->connection = ConnectionManager::get('default');
    }

    public function clean() {
        $this->connection->execute('TRUNCATE TABLE todos');
    }

    public function hasOne($name) {
        $results = $this->connection->execute('SELECT * FROM todos WHERE name = :name', ['name' => $name])->fetchAll('assoc');
        return sizeof($results) == 1;
    }
}
