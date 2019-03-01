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
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;


//
/**
 * Defines application features from the specific context.
 */
class StudentContext extends MinkContext implements Context,SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    use Migrator, DatabaseTransactions , AttendanceTrait , StudentTrait , FeeTrait;

    protected $selectedStudent;
    protected $centreid;
    protected $batchid;

    public function __construct()
    {
    }

    
    /**
     * @BeforeSuite
     */
     public static function login(BeforeSuiteScope $scope)
     {
	     Auth::loginUsingId(1);
     }


    /**
     * @Given I am on students page
     */
    public function iAmOnStudentsPage()
    {
       $this->visit('/students');
	    $this->assertResponseStatus(200);
    }
    /**
     * @When I go to students page
     */
    public function iGoToStudentsPage()
    {
       $this->visit('/students');
       $this->assertResponseStatus(200);
    }

   /**
     * @Given I am on a particular student page
     */
    public function iAmOnAParticularStudentPage()
    {
	    $this->getAStudent();    
	    $this->visit('/students/'.$this->selectedStudent->id);
    }

        /**
     * @Given I am on a particular student page who has paid fees
     */
    public function iAmOnAParticularStudentPageWhoHasPaidFees()
    {
	$this->getAStudentWhoHasPaidFees();
	$this->visit('/students/'.$this->selectedStudent->id);
    }
}
