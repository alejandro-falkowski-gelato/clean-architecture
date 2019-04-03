<?php

/**
 * SQLRepository class file
 *
 * PHP Version 7
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

namespace Gelato\Add;

use Cake\Datasource\ConnectionManager;

use Gelato\Add\Repository;

/**
 * Represents the SQL repository.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class SQLRepository implements Repository
{
    /**
     * Create an SQL repository
     */
    public function __construct()
    {
        $this->connection = ConnectionManager::get('default');
    }

    /**
     * Adds a todo
     *
     * @param Todo $todo The todo to add.
     *
     * @return void
     */
    public function add($todo)
    {
        $this->connection->insert(
            'todos', [
            'id' => $todo->id(),
            'name' => $todo->name(),
            ]
        );
    }
};
