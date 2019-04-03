
<?php

use Ramsey\Uuid\Uuid;

use Gelato\Add\Request;
use Gelato\Add\Repository;
use Gelato\Add\Data;
use Gelato\Add\Status;
use Gelato\Add\DuplicateException;
use Gelato\Add\Command;

class AlwaysTodoRepository implements Repository {
    public $todos = [];

    public function add($todo) {
        array_push($this->todos, $todo);
    }
};

class DuplicateTodoRepository implements Repository {
    public function add($todo) {
        throw new DuplicateException("{$todo->name()} is already added!");
    }
};

describe("Add a todo", function() {
    given('id', function() { return Uuid::uuid4(); });
    given('name', function() { return 'TEST'; });
    given('data', function() { return new Data($this->id, $this->name); });
    given('request', function() { return new Request($this->data); });

    it("Adding a new todo", function() {
        $repository = new AlwaysTodoRepository();
        $command = new Command($repository);

        $response = $command->perform($this->request);
        expect($response->status()->code())->toBe(Status::SUCCESS);

        expect($repository->todos)->toHaveLength(1);

        $todo = $repository->todos[0];
        expect($todo->id())->toBe($this->id);
        expect($todo->name())->toBe($this->name);
    });

    it("Can't add a duplicate todo", function() {
        $repository = new DuplicateTodoRepository();
        $command = new Command($repository);

        $response = $command->perform($this->request);
        expect($response->status()->code())->toBe(Status::DUPLICATE);
    });
});
