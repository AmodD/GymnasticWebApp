Feature: Login	
	
	What is the feature: Authentication
	Who will benefit: the admin and the client
	Why this feature is required: in order to have a access to the web application

	Background:
		Given I am not logged in

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
		When I fill in "email" with "ap@abc.com"
		And I fill in "password" with "abc"
		And I press "Login"
		Then I should not see "login" 
		And I should see "logout" 
