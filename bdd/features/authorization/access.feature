Feature: Access	
	
	What is the feature: Authorize actions only on login
	Who will benefit: Abihjeet Padhye
	Why this feature is required: so that guests cannot access the owner features
	
	Background:
		Given I am not logged in

	Scenario: I visit the dashboard
		Given I am on homepage
		When I go to "dashboard"
		Then I should be on "login"

	Scenario: I visit the centres page 
		Given I am on homepage
		When I go to "centres"
		Then I should be on "login"

	Scenario: I visit the batches page 
		Given I am on homepage
		When I go to "batches"
		Then I should be on "login"
	
	Scenario: I visit the students page 
		Given I am on homepage
		When I go to "students"
		Then I should be on "login"

