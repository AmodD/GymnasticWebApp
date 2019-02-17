Feature: Menu		
	
	What is the feature: This is the menu bar also called navbar
	Who will benefit: Abihjeet Padhye
	Why this feature is required: for navigation throughout the website

		Scenario: I visit the centres page 

			Given I am on "dashboard"
			When I go to "centres"
			Then I should be on "centres"
			And the response status code should be 200

		Scenario: I visit the batches page 

			Given I am on "dashboard"
			When I go to "batches"
			Then I should be on "batches"
			And the response status code should be 200
	
		Scenario: I visit the students page 

			Given I am on "dashboard"
			When I go to "students"
			Then I should be on "students"
			And the response status code should be 200 
