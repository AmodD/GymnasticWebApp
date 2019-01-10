Feature: I Login		
	(Note: I can be stored in a database directly as it is a single User application)

		What is the feature: This is the Login form for the web application
		who will benefit: the admin
		why this feature is required: in order to have a access formr the web application

		Scenario: I visit the homepage

			Given I am on homepage
			Then  the "username" field should contain "username"
			And   the "password" field should contain "password"
			When  I press "Login"	
			Then  the url should match "/users"

		Scenario: I Enter the Details	
		
			Given I am on homepage
			And   I fill in "username" with "Ajinkya"
			And   I fill in "password" with "abc"
			And   I press "Login"
			Then  I should be on "/users"

		Scenario: Incorrect Password

			Given I am on homepage
			When  I fill in the Username with "Ajinkya"
			And   I fill in the password with "efg"
			And   I click Log In Button
			Then  I should see homepage
			And   I should see error "credentials not matched"

			






				