<?php

trait AttendanceTrait
{

    private function getAnUnmarkedStudent()
    {
	    if($this->batchid) $students = App\Student::all();
	    else $students = App\Student::where('batch_id',$this->batchid)->get();

	    foreach($students->shuffle() as $student)
	    {
		if($student->giveTodaysAttendance() == -1) $this->selectedStudent = $student;
		break;	
	    }
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

}
