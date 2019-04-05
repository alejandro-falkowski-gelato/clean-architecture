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

use Gelato\SQLCommonRespository;

/**
 * Represents the SQL repository.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class SQLRepository extends SQLCommonRespository implements Repository
{
    /**
     * Adds a todo
     *
     * @param Todo $todo The todo to add.
     *
     * @return void
     */
    public function add($todo)
    {
        try {
            $this->connection->insert(
                'todos',
                [ 'id' => $todo->id(), 'name' => $todo->name() ]
            );
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'SQLSTATE[23505]') !== false) {
                throw new DuplicateException("{$todo->name()} is already added!");
            }

            throw $e;
        }
    }
};
