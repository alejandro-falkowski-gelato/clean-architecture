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

namespace Gelato\Add;

use Cake\Datasource\ConnectionManager;

/**
 * Represents a common SQL repository.
 * We need to make sure we handle the cases desxcribed here https://www.postgresql.org/docs/9.2/errcodes-appendix.html
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class SQLCommonRespository
{
    private $_connection;

    /**
     * Create an SQL Common Respository
     */
    public function __construct()
    {
        ConnectionManager::drop('default');
        ConnectionManager::setConfig('default', ['url' => getenv('DATABASE_URL')]);

        $this->_connection = ConnectionManager::get('default');
    }

    /**
     * Make ssure that the connection is safely used.
     *
     * @param Function $callback The callback with the connection object.
     *
     * @return Status The output of the callback.
     */
    protected function withConnection($callback)
    {
        try {
            return $callback($this->_connection);
        } catch (\PDOException $e) {
            if (strpos($e->getMessage(), 'SQLSTATE[23505]') !== false) {
                throw new DuplicateException();
            }

            throw $e;
        }
    }
}
