Feature: Add a todo

  Scenario: Adding a new todo
    When I want to add a todo of "Make my bed"
    Then I should succesufully have a todo of "Make my bed"

  Scenario: Can't add a duplicate todo
    Given I already have a todo of "Make my bed"
    When I want to add a todo of "Make my bed"
    Then I should not have another todo of "Make my bed"
