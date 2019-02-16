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
class StudentContextCopy extends MinkContext implements Context,SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    use Migrator, DatabaseTransactions , AttendanceTrait , StudentTrait;

    protected $selectedStudent;
    protected $centreid;
    protected $batchid;

    public function __construct()
    {
    }


    /**
     * @Given I am on dashboard
     */
    public function iAmOnDashboard()
    {
       $this->visit('/dashboard');
    }

    /**
     * @When I click students menu
     */
    public function iClickStudentsMenu()
    {
	$this->clickLink('students_menu');    
    }

    /**
     * @Then I should see list of students
     */
    public function iShouldSeeListOfStudents()
    {
	    $this->assertPageContainsText(App\Student::all()->random()->name);
    }

    /**
     * @Given I am on the students page
     */
    public function iAmOnTheStudentsPage()
    {
       $this->visit('/students');
    }


    /**
     * @When I click a particular student
     */
    public function iClickAParticularStudent()
    {
	    $this->selectedStudent = App\Student::all()->random();
	    $this->clickLink($this->selectedStudent->name."");
	    $this->assertResponseStatus(200);
    }

    /**
     * @Then I should see all details of the student
     */
    public function iShouldSeeAllDetailsOfTheStudent()
    {
	    $this->assertPageContainsText($this->selectedStudent->name);
    }

        /**
     * @Then I should see :arg1 for :arg2 student
     */
    public function iShouldSeeForStudent($arg1, $arg2)
    {
	$this->assertResponseContains('<div class="title is-7" id="status_'.$arg2.'_'.$this->selectedStudent->id.'">'.$arg1.'</div>');
    }

}
