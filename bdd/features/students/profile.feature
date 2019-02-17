Feature: Student Profile Page		
	
	What is the feature: Indiviual student page
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To show details of a particular student
	
	Scenario: Go To Students
		Given I am on homepage
		When I go to students page
		Then I should see list of students
	
	Scenario: Go To A Particular Student
		Given I am on students page
		When I click a particular student
		Then I should see all details of the student
