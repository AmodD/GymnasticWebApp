<?php

trait BatchTrait
{
	public function getBatch()
	{
		$batch = App\Batch::all()->random();
		$this->batchid = $batch->id;
	}	
}
