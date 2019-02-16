Feature: Dashboard Page		
	
	What is the feature: This is the Dashboard page
	Who will benefit: Abihjeet Padhye
	Why this feature is required: to have a consolidated view

		Scenario: Lets First Login	

			Given I am on homepage
			When I fill in "email" with "ap@abc.com"
			And I fill in "password" with "abc"
			And I press "Login"
			Then  the url should match "dashboard"

		Scenario: I visit the dashboad page 

			Given I am on "dashboard"
			Then I should see "DASHBOARD"
			And I should see "Symbiosis"
			And I should see "Kalyani School"

	
		Scenario: Logout

			Given I am on homepage
			And I press "logout"
			Then  the url should match "/"
			And I should see "login" 
