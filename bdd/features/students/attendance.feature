Feature: Mark Attendance		
	
	What is the feature: Marking daily attendances and editing attendances
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To mark attendances for student

	
	Scenario: See today's attendance of an umarked student on all students page
		Given I am on students page
		When For a student whose today's attendance is unmarked
		Then I should see Present and Absent buttons for that student
		And I should see "Today's attendance : Not Yet Marked"
	
	Scenario: Mark a Student Present
		Given I am on students page
		When I click present for an unmarked student
		Then I should see "Today's Attendance : Present"

	Scenario: Mark a Student Absent
		Given I am on students page
		When I click absent for an unmarked student
		Then I should see "Today's Attendance : Absent"

		Scenario: Logout

			Given I am on homepage
			And I press "logout"
			Then  the url should match "/"
			And I should see "login" 

