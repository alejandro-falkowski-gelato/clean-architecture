
<?php

use Ramsey\Uuid\Uuid;

interface TodoRepository {
    public function add($todo);
}

class AddRequest {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function id() {
        return $this->id;
    }

    public function name() {
        return $this->name;
    }
};

class Todo {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function id() {
        return $this->id;
    }

    public function name() {
        return $this->name;
    }
};

class Add {
    private $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function perform($request) {
        $todo = new Todo($request->id(), $request->name());

        $this->repository->add($todo);
    }
};

class AlwaysTodoRepository implements TodoRepository {
    public $todos = [];

    public function add($todo) {
        array_push($this->todos, $todo);
    }
};

describe("Add a todo", function() {
    given('id', function() { return Uuid::uuid4(); });
    given('name', function() { return 'TEST'; });
    given('request', function() { return new AddRequest($this->id, $this->name); });

    it("Adding a new todo", function() {
        $repository = new AlwaysTodoRepository();
        $useCase = new Add($repository);

        $response = $useCase->perform($this->request);

        expect($repository->todos)->toHaveLength(1);

        $todo = $repository->todos[0];
        expect($todo->id())->toBe($this->id);
        expect($todo->name())->toBe($this->name);
    });

    // it("Can't add a duplicate todo", function() {
    //     expect(false)->toBe(true);
    // });
});
