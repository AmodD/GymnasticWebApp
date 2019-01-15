Feature: Institute		
	(Note: User can be stored in a database directly as it is a single User application)

		What is the feature: This is the Institute Tab for the web application
		who will benefit: the admin
		why this feature is required: In order to see list of institutes, [add/modify/delete] institute , 								  see list of students under each institute

		Scenario: I visit the InstitutePage

			Given I am on InstitutePage
			Then  print last response
			Then  I should see "Symbiosis" 
			And   I should see "ManCity"
			And   I should see "add" "modify" "delete"			
			

		Scenario: I Select the institute

			Given I follow link "Symbiosis"
			Then  I should be on "/insitutes/symbiosis"
	     	
		

			






				