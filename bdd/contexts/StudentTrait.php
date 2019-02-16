<?php

trait StudentTrait
{
    protected $students;	

    private function getStudents()
    {
	    if($this->batchid) $this->students = App\Student::where('batch_id',$this->batchid)->get();
	    else $this->students = App\Student::all();
	    
	    if(!$this->students || $this->students->count() == 0) throw new Exception('Error : Students not available');
    }	    

    private function getAStudent()
    {
	    $this->getStudents();

	    $this->selectedStudent = $this->students->random();
	    
	    if(!$this->selectedStudent) throw new Exception('Error : Student could not be selected');
    }
    /**
     * @Then I should see list of students
     */
    public function iShouldSeeListOfStudents()
    {
	    $this->getAStudent();
	    $this->assertPageContainsText($this->selectedStudent->name);
    }

    /**
     * @When I click a particular student
     */
    public function iClickAParticularStudent()
    {
	    $this->getAStudent();
	    $this->clickLink($this->selectedStudent->name);
	    $this->assertResponseStatus(200);
    }

    /**
     * @Then I should see all details of the student
     */
    public function iShouldSeeAllDetailsOfTheStudent()
    {
	    $this->assertPageContainsText($this->selectedStudent->name);
    }

    
}
