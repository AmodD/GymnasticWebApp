Feature: Navigation		
	
	What is the feature: This is the menu bar also called navbar
	Who will benefit: Abihjeet Padhye
	Why this feature is required: for navigation throughout the website

		Scenario: Lets First Login	

			Given I am on homepage
			When I fill in "email" with "ap@abc.com"
			And I fill in "password" with "abc"
			And I press "Login"
			Then  the url should match "dashboard"

		Scenario: I visit the centres page 

			Given I am on "dashboard"
			When I go to "centres"
			Then I should see "CENTRES"
			And I should see "Symbiosis"
			And I should see "Kalyani School"

		Scenario: I visit the batches page 

			Given I am on "dashboard"
			When I go to "batches"
			Then I should see a list of all batches
	
		Scenario: I visit the students page 

			Given I am on "dashboard"
			When I go to "students"
			Then I should see a list of all students

		Scenario: Logout

			Given I am on homepage
			And I press "logout"
			Then  the url should match "/"
			And I should see "login" 
