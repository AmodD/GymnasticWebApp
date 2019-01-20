<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
#This will be needed if you require "behat/mink-selenium2-driver"
#use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;

use PHPUnit\Framework\Assert as PHPUnit;
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
     * @Given I have the following users
     */
    public function iHaveTheFollowingUsers(TableNode $table)
    {
        $this->usertable = $table;
    }

    /**
     * @Given I fill in :username :password
     */
    public function iFillIn($email, $password)
    {
        // foreach($this->usertable as $user){

        //     if($this->fillField('email',$user['email'])){

        //         if($this->fillField('password',$user['password'])){

        //             PHPUnit::assertTrue(true);
        //         }

        //         PHPUnit::assertTrue(false);
        //     }
        // }        
    }

    /**
     * @Given I am on InstitutePage
     */
    public function iAmOnInstitutepage()
    {
       $this->visit('/institutes');
    }

    /**
     * @Then I should see :institute1 :Institute2
     */
    public function iShouldSee($institute)
    {
       
      PHPUnit::assertSeeText($institute);
    }

    /**
     * @Given I follow link :arg1
     */
    public function iFollowLink($modify)
    {
        throw new PendingException();
    }

}