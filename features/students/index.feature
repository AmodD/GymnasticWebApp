Feature: Students Index Page		
	
	What is the feature: All students list irrespective of centre and/or batch
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To have a list of all students on one page

	Scenario: Lets First Login	
		Given I am on homepage
		When I fill in "email" with "ap@abc.com"
		And I fill in "password" with "abc"
		And I press "Login"
		Then  the url should match "dashboard"

	Scenario: Go To Students
		Given I am on dashboard
		When I click students menu
		Then I should see list of students

	Scenario: Today's Attendance Unmarked Students
		Given I am on the students page
		And For a student whose today's attendance is unmarked
		Then I should see Present and Absent buttons for that student
		And I should see "Today's attendance : Not Yet Marked"

	Scenario: Mark a Student Present
		Given I am on the students page
		When I click present for an unmarked student
		Then I should see "Today's Attendance : Present" for "present" student

	Scenario: Mark a Student Absent
		Given I am on the students page
		When I click absent for an unmarked student
		Then I should see "Today's Attendance : Absent" for "absent" student

	Scenario: Logout
		Given I am on homepage
		And I press "logout"
		Then  the url should match "/"
		And I should see "login" 

