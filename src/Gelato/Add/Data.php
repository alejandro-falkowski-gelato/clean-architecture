<?php

/**
 * Data class file
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

/**
 * Represents the add request/response data.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class Data
{
    private $_id;
    private $_name;

     /**
      * Create an add request
      *
      * @param UUID   $id   The ID of the request.
      * @param string $name The name of the request.
      */
    public function __construct($id, $name)
    {
        $this->_id = $id;
        $this->_name = $name;
    }

     /**
      * The ID of the request.
      *
      * @return UUID
      */
    public function id()
    {
        return $this->_id;
    }

    /**
     * The name of the request.
     *
     * @return string
     */
    public function name()
    {
        return $this->_name;
    }
};
