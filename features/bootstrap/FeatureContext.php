<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
#This will be needed if you require "behat/mink-selenium2-driver"
#use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;

use PHPUnit_Framework_Assert as PHPUnit;
use Laracasts\Behat\Context\Migrator;
use Laracasts\Behat\Context\DatabaseTransactions;


//
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context,SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    use Migrator, DatabaseTransactions;

    protected $usertable;

    public function __construct()
    {
    }

    /**
     * @Then I should see Username as placeholder the Textbox in the top right corner
     */
    public function iShouldSeeUsernameAsPlaceholderTheTextboxInTheTopRightCorner()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see Password as placeholder in the Textbox in the top right corner
     */
    public function iShouldSeePasswordAsPlaceholderInTheTextboxInTheTopRightCorner()
    {
        throw new PendingException();
    }

    /**
     * @Then Login Button
     */
    public function loginButton()
    {
        throw new PendingException();
    }

    /**
     * @When I fill in the Username with :arg1
     */
    public function iFillInTheUsernameWith($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I fill in the password with :arg1
     */
    public function iFillInThePasswordWith($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I click Log In Button
     */
    public function iClickLogInButton()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see dashboard
     */
    public function iShouldSeeDashboard()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see homepage
     */
    public function iShouldSeeHomepage()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see error :arg1
     */
    public function iShouldSeeError($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I have the following users
     */
    public function iHaveTheFollowingUsers(TableNode $table)
    {
        $this->usertable = $table;
    }

    /**
     * @Given I fill in :username :password
     */
    public function iFillIn($username, $password)
    {
        foreach($this->usertable as $user){

            if($this->fillField('username',$user['username'])){

                dd($user['username']);

                if($this->fillField('password',$user['password'])){

                    PHPUnit::assertTrue(true);
                }

                PHPUnit::assertTrue(false);
            }
        }        
    }
}
