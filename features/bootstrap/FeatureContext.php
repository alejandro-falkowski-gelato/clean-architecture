<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
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
    }

    /**
     * @Given I already have a todo of :arg1
     */
    public function iAlreadyHaveATodoOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I want to add a todo of :arg1
     */
    public function iWantToAddATodoOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should succesufully have a todo of :arg1
     */
    public function iShouldSuccesufullyHaveATodoOf($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should not have another todo of :arg1
     */
    public function iShouldNotHaveAnotherTodoOf($arg1)
    {
        throw new PendingException();
    }
}
