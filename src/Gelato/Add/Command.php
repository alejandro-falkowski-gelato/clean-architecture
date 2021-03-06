<?php

/**
 * Command class file
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

use Gelato\Todo;
use Gelato\Add\Response;
use Gelato\Add\Status;

/**
 * Represents the add command.
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

class Command
{
    private $_repository;

    /**
     * Create a Command
     *
     * @param Repository $repository The repository to use for the command.
     */
    public function __construct($repository)
    {
        $this->_repository = $repository;
    }

    /**
     * Perform the command.
     *
     * @param Request $request The request to perform.
     *
     * @return void
     */
    public function perform($request)
    {
        $data = $request->data();
        $todo = new Todo($data->id(), $data->name());

        try {
            $this->_repository->add($todo);
            $status = new Status(Status::SUCCESS, '');
        } catch (DuplicateException $e) {
            $status = new Status(Status::DUPLICATE, $e->getMessage());
        }

        return new Response($data, $status);
    }
};
