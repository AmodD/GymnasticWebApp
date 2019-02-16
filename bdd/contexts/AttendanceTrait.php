<?php

trait AttendanceTrait
{
    private function getAnUnmarkedStudent()
    {
	    if($this->batchid) $students = App\Student::where('batch_id',$this->batchid)->get();
	    else  $students = App\Student::all();

	    if(!$students || $students->count() == 0) throw new Exception('Error : Students not available');

	    foreach($students->shuffle() as $student)
	    {
		if($student->giveTodaysAttendance() == -1) $this->selectedStudent = $student;
		break;	
	    }
	    
	    if(!$this->selectedStudent) throw new Exception('Error : Student could not be selected');
    }


    /**
     * @When For a student whose today's attendance is unmarked
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
	    $this->pressButton('present_'.$this->selectedStudent->id);
    }

    /**
     * @When I click absent for an unmarked student
     */
    public function iClickAbsentForAnUnmarkedStudent()
    {
	    $this->getAnUnmarkedStudent();
	    $this->pressButton('absent_'.$this->selectedStudent->id);
    }
}
