Feature: Students Show Page		
	
	What is the feature: Indiviual student page
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To show details of a particular student

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
	
	Scenario: Go To A Particular Student
		Given I am on the students page
		When I click a particular student
		Then I should see all details of the student
	
	Scenario: Logout
		Given I am on homepage
		And I press "logout"
		Then  the url should match "/"
		And I should see "login" 

