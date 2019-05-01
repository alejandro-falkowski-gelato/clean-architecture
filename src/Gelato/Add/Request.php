<?php

/**
 * Request class file
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
 * Represents the add request.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class Request
{
    private $_data;

     /**
      * Create an add request
      *
      * @param Data $data The data of the request.
      */
    public function __construct($data)
    {
        $this->_data = $data;
    }

     /**
      * The data of the request.
      *
      * @return Data
      */
    public function data()
    {
        return $this->_data;
    }
};
