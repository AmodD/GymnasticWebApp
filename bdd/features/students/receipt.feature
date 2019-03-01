@cf
Feature: Receipt		
	
	What is the feature: Indiviual student receipt emailing
	Who will benefit: Abihjeet Padhye
	Why this feature is required: To send receipt to a particular student
	
	Scenario: See Send receipt email button
		Given I am on a particular student page who has paid fees
		Then I should see "Send Receipt Email"

	Scenario: Click Send receipt email button	
		Given I am on a particular student page who has paid fees
		When I press "send"  
		Then I should see "Success !!!"
