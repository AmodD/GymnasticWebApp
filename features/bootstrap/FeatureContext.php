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
     * @When I click batches for any centre
     */
    public function iClickBatchesForAnyCentre()
    {
	    $this->centreid = App\Centre::all()->random()->id;
       	    $this->visit('/centres/'.$this->centreid.'/batches');
	    $this->assertResponseStatus(200);
		    
    }

    /**
     * @Then I should see list of batches of that centre
     */
    public function iShouldSeeListOfBatchesOfThatCentre()
    {
	    $batch_name = App\Centre::find($this->centreid)->batches->random()->name;	    
	    $this->assertPageContainsText($batch_name);
    }

    /**
     * @Given I am on the batches page
     */
    public function iAmOnTheBatchesPage()
    {
	    $this->iClickBatchesForAnyCentre();
    }

    /**
     * @When I click students for any batch
     */
    public function iClickStudentsForAnyBatch()
    {
	    $this->batchid = App\Centre::find($this->centreid)->batches->random()->id;	    
	    $this->visit('/centres/'.$this->centreid.'/batches/'.$this->batchid.'/students');
	    $this->assertResponseStatus(200);
    }

    /**
     * @Then I should see list of students for that batch
     */
    public function iShouldSeeListOfStudentsForThatBatch()
    {
	    $student_name = App\Batch::find($this->batchid)->students->random()->name;	    
	    $this->assertPageContainsText($student_name);
    }

    /**
     * @Then I should see a :arg1 button
     */
    public function iShouldSeeAButton($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given I am on the students page
     */
    public function iAmOnTheStudentsPage()
    {
	    $this->iClickBatchesForAnyCentre();
	    $this->iClickStudentsForAnyBatch();
    }

    /**
     * @When I click present for an unmarked student
     */
    public function iClickPresentForAnUnmarkedStudent()
    {
	    $students = App\Batch::find($this->batchid)->students;
	    $selectedStudent;

	    foreach($students->shuffle() as $student)
	    {
		if($student->giveTodaysAttendance() == -1) $selectedStudent = $student;
		break;	
	    }
            
	    $this->pressButton('present_'.$selectedStudent->id);
	    	
    }

    /**
     * @When I click absent for an unmarked student
     */
    public function iClickAbsentForAnUnmarkedStudent()
    {
	    $students = App\Batch::find($this->batchid)->students;
	    $selectedStudent;

	    foreach($students->shuffle() as $student)
	    {
		if($student->giveTodaysAttendance() == -1) $selectedStudent = $student;
		break;	
	    }
            
	    $this->pressButton('absent_'.$selectedStudent->id);
    }
}
