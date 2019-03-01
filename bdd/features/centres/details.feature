Feature: Centres Details Page		
	
	What is the feature: Individual centre page 
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To show details of a centre


	Scenario: Go To Centres
		Given I am on homepage
		When I go to centres page
		Then I should see list of centres

	Scenario: Go To A Particular Centre
		Given I am on centres page
		When I click a particular centre
		Then I should see all details of the centre
	
	Scenario: Page Layout
		Given I am on centres page
		When I click a particular centre
	 	Then the "div" element should contain "class=\"tile is-ancestor\""
		And the "div" element should contain "class=\"tile is-child box\""
		And I should see "Fee"
		And I should see "Attendance"
