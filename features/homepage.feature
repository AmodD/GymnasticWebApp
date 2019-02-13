Feature: HomePage		
	(Note: I can be stored in a database directly as it is a single User application)

		What is the feature: This is the Home Page / Landing Page which has the Login form for the web application
		who will benefit: the admin and the client
		why this feature is required: in order to have a access to the web application

		Scenario: I visit the homepage

			Given I am on homepage
			Then  the url should match "/"
			And I should see "login"
			And I should not see "logout"

		Scenario: Incorrect Password

			Given I am on homepage
			When I fill in "email" with "asdasd@abc.com"
			And I fill in "password" with "sdfsdf"
			And I press "Login"
			Then  I should be on "/" 
			And   I should see "These credentials do not match our records"
	
		Scenario: Correct Login	

			Given I am on homepage
			When I fill in "email" with "ap@abc.com"
			And I fill in "password" with "abc"
			And I press "Login"
			Then  the url should match "dashboard"

		Scenario: Re-Attempt Login After Successfull Login

			Given I am on homepage
			Then I should not see "login" 
			And I should see "logout" 

		Scenario: Click Dashboard

			Given I am on homepage
			And I click "dashboard"
			Then  the url should match "dashboard"
			And I should see "Dashboard" 
	     	
		Scenario: Logout

			Given I am on homepage
			And I press "logout"
			Then  the url should match "/"
			And I should see "login" 

	     	

			






				
