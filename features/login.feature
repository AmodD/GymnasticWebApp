Feature: I Login		
	(Note: I can be stored in a database directly as it is a single User application)

		What is the feature: This is the Login form for the web application
		who will benefit: the admin
		why this feature is required: in order to have a access formr the web application

		Scenario: I visit the homepage

			Given I am on homepage
			#Then  the "username" field should contain "username"
			#And   the "password" field should contain "password"
			When  I press "Login"	
			Then  the url should match "/"

		Scenario: I Enter the Details	

			Given I am on homepage
			And   I have the following users
					|username|password|
					|Ajinkya|abc|
					|Amod|abc|
					|Admin|abc|
			And   I fill in "Ajinkya" "abc"		
			And   I press "Login"
			Then  I should be on "/users"
	     	
		Scenario: Incorrect Password

			Given I am on homepage
			Given I have the following users
					|username|password|
					|Ajinkya|abc|
					|Amod|abc|
					|Admin|abc|
					#|Reeya|efg|
			When  I fill in "Reeya" "efg"			
			And   I press "Login"
			Then  I should be on "/" 
			#And   I should see "credentials not matched"
			#And  I should see error "credentials not matched"

			






				