Feature:
  In order to start to interact with the platform
  As a person
  I want to be able to make an account
  And start to interact with the site

  Scenario: An user wants to create him account
    When a register scenario sends a request to "/register"
    Then an user must be created in our database
