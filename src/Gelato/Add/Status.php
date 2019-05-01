<?php

/**
 * Status class file
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
 * Represents the status of the response.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class Status
{
    public const SUCCESS = 200;
    public const DUPLICATE = 400;

    private $_code;
    private $_message;

     /**
      * Create an add request
      *
      * @param int    $code    The code of the status.
      * @param string $message The message of the status.
      */
    public function __construct($code, $message)
    {
        $this->_code = $code;
        $this->_message = $message;
    }

     /**
      * The code of the status.
      *
      * @return int
      */
    public function code()
    {
        return $this->_code;
    }

     /**
      * The message of the status.
      *
      * @return int
      */
    public function message()
    {
        return $this->_message;
    }
};
