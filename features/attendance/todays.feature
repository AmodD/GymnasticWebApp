Feature: Todays Attendance		
	
	What is the feature: Marking daily attendances
	Who will benefit: Abihjeet Padhye
	Why this feature is required: Easily mark student's current attendance

		Scenario: Lets First Login	

			Given I am on homepage
			When I fill in "email" with "ap@abc.com"
			And I fill in "password" with "abc"
			And I press "Login"
			Then  the url should match "dashboard"

	Scenario: List Batches
		Given I am on dashboard
		When I click batches for any centre
		Then I should see list of batches of that centre

	Scenario: List Students
		Given I am on the batches page
		When I click students for any batch
		Then I should see list of students for that batch

	Scenario: For Unmarked Students
		Given I am on the students page
		When A student is unmarked
		Then I should see Present and Absent buttons

	Scenario: Mark a Student Present
		Given I am on the students page
		When I click present for an unmarked student
		Then I should see "Today's Attendance : Present"

	Scenario: Mark a Student Absent
		Given I am on the students page
		When I click absent for an unmarked student
		Then I should see "Today's Attendance : Absent"

		Scenario: Logout

			Given I am on homepage
			And I press "logout"
			Then  the url should match "/"
			And I should see "login" 

