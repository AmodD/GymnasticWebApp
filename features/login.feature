Feature: I Login		
	(Note: I can be stored in a database directly as it is a single User application)

		What is the feature: This is the Login form for the web application
		who will benefit: the admin
		why this feature is required: in order to have a access formr the web application


		Scenario: I visits the homepage

			Given I am on homepage
			Then  I should see Username as placeholder the Textbox in the top right corner
			And   I should see Password as placeholder in the Textbox in the top right corner
			And   Login Button	

		Scenario: I Enter the Details	
			
			When  I fill in the Username with "Ajinkya"
			And   I fill in the password with "abc"
			And   I click Log In Button
			Then  I should see dashboard

		Scenario: Incorrect Password
			
			When  I fill in the Username with "Ajinkya"
			And   I fill in the password with "efg"
			And   I click Log In Button
			Then  I should see homepage
			And   I should see error "credentials not matched"

			






				