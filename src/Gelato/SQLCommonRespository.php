<?php

/**
 * SQLCommonRespository class file
 *
 * PHP Version 7
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

namespace Gelato;

use Cake\Datasource\ConnectionManager;

/**
 * Represents a common SQL repository.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class SQLCommonRespository
{
    protected $connection;

    /**
     * Create an SQL Common Respository
     */
    public function __construct()
    {
        ConnectionManager::drop('default');
        ConnectionManager::setConfig('default', ['url' => getenv('DATABASE_URL')]);

        $this->connection = ConnectionManager::get('default');
    }
}
