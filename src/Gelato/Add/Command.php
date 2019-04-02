<?php

namespace Gelato\Add;

use Gelato\Todo;

class Command
{
    private $_repository;

    public function __construct($repository)
    {
        $this->_repository = $repository;
    }

    public function perform($request)
    {
        $todo = new Todo($request->id(), $request->name());

        $this->_repository->add($todo);
    }
};
