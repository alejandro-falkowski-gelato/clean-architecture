<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

use Ramsey\Uuid\Uuid;

use Gelato\Add\Request;
use Gelato\Add\Repository;
use Gelato\Add\Data;
use Gelato\Add\Status;
use Gelato\Add\DuplicateException;
use Gelato\Add\Command;
use Gelato\Add\SQLRepository;

/**
 * Defines application features from the specific context.
 */
class AddTodoContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->featureRepository = new SQLTodoRepository();
        $this->featureRepository->clean();
        $this->repository = new SQLRepository();
        $this->command = new Command($this->repository);
    }

    /**
     * @Given I already have a todo of :todo
     */
    public function iAlreadyHaveATodoOf($todo)
    {
        $data = new Data(Uuid::uuid4(), $todo);
        $request = new Request($data);
        $this->response = $this->command->perform($request);
    }

    /**
     * @When I want to add a todo of :todo
     */
    public function iWantToAddATodoOf($todo)
    {
        $data = new Data(Uuid::uuid4(), $todo);
        $request = new Request($data);
        $this->response = $this->command->perform($request);
    }

    /**
     * @Then I should succesufully have a todo of :todo
     */
    public function iShouldSuccesufullyHaveATodoOf($todo)
    {
        expect($this->response->status()->code())->toBe(Status::SUCCESS);
        expect($this->featureRepository->hasOne($todo))->toBe(true);
    }

    /**
     * @Then I should not have another todo of :todo
     */
    public function iShouldNotHaveAnotherTodoOf($todo)
    {
        expect($this->response->status()->code())->toBe(Status::DUPLICATE);
        expect($this->featureRepository->hasOne($todo))->toBe(true);
    }
}
