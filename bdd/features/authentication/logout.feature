Feature: Logout		
	
	What is the feature: Authentication
	Who will benefit: the admin and the client
	Why this feature is required: in order to logout of the web application

	Scenario: Logout
		Given I am on homepage
		And I press "logout"
		Then  the url should match "/"
		And I should see "login" 
