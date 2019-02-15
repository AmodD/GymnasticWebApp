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
class StudentContext extends MinkContext implements Context,SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    use Migrator, DatabaseTransactions;

    protected $selectedStudent;
    protected $centreid;
    protected $batchid;

    public function __construct()
    {
    }

    private function getAnUnmarkedStudent()
    {
	    $students = App\Student::all();

	    foreach($students->shuffle() as $student)
	    {
		if($student->giveTodaysAttendance() == -1) $this->selectedStudent = $student;
		break;	
	    }
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
     * @Given For a student whose today's attendance is unmarked
     */
    public function forAStudentWhoseTodaysAttendanceIsUnmarked2()
    {
	    $this->getAnUnmarkedStudent();
    }

    /**
     * @Given For a student today's attendance is unmarked
     */
    public function forAStudentWhoseTodaysAttendanceIsUnmarked()
    {
	    $this->getAnUnmarkedStudent();
    }

    /**
     * @Then I should see Present and Absent buttons for that student
     */
    public function iShouldSeePresentAndAbsentButtonsForThatStudent()
    {
	    $this->assertResponseContains('present_'.$this->selectedStudent->id);
	    $this->assertResponseContains('absent_'.$this->selectedStudent->id);
    }

    /**
     * @When I click present for an unmarked student
     */
    public function iClickPresentForAnUnmarkedStudent()
    {
	    $this->getAnUnmarkedStudent();
	    if($this->selectedStudent) $this->pressButton('present_'.$this->selectedStudent->id);
    }

    /**
     * @When I click absent for an unmarked student
     */
    public function iClickAbsentForAnUnmarkedStudent()
    {
	    $this->getAnUnmarkedStudent();
	    if($this->selectedStudent) $this->pressButton('absent_'.$this->selectedStudent->id);
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
