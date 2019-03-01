<?php

trait FeeTrait
{
    /**
     * @Given fee has already been paid for the month :arg1 and year :arg2
     */
    public function feeHasAlreadyBeenPaidForTheMonthAndYear($arg1, $arg2)
    {
	
	    
	$filtered = $this->selectedStudent->fees->filter(function ($value, $key) {
	    return $value > 2;
	});

    }


}
