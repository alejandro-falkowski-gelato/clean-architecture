<?php

/**
 * Response class file
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
 * Represents the add response.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class Response
{
    private $_data;
    private $_status;

     /**
      * Create an add response
      *
      * @param Data   $data   The data of the response.
      * @param Status $status The status of the response.
      */
    public function __construct($data, $status)
    {
        $this->_data = $data;
        $this->_status = $status;
    }

     /**
      * The data of the response.
      *
      * @return Data
      */
    public function data()
    {
        return $this->_data;
    }

     /**
      * The status of the response.
      *
      * @return Status
      */
    public function status()
    {
        return $this->_status;
    }
};
