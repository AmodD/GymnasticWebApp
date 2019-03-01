Feature: Fee		
	
	What is the feature: Indiviual student Fee Submission
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To pay fee for a particular student
	
	Scenario: Go To A Particular Student
		Given I am on a particular student page
		Then I should see "Fee"

	Scenario: Fee Payment
		Given I am on a particular student page
		When I select "12" from "day"
		And I select "9" from "month"
		And I select "2018" from "year"
		And I press "paid"
		Then I should see "Fee payment successfully added" 
		#And the "td" element should contain "2018-09-12"
		And the response should contain "2018-09-12"

	Scenario: Unsuccessfull Fee Payment
		Given I am on a particular student page
		When I select "" from "day"
		And I select "" from "month"
		And I select "" from "year"
		And I press "paid"
		Then I should see "The day field is required." 
		And I should see "The month field is required." 
		And I should see "The year field is required." 

	@wip	
	Scenario Outline: Fee Re-Payment for same month year
		Given I am on a particular student page
		And fee has already been paid for the month <month> and year <year>
		When I select "<day>" from "day"
		And I select "<month>" from "month"
		And I select "<year>" from "year"
		And I press "paid"
		Then I should see "Fee payment already done" 

		Examples:
		    | day | month | year |
		    |  14   |  9  |  2018   |
		    |  20   |  9  |  2018  |
