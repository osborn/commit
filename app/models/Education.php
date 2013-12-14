<?php

/**
* 
*/
class Education extends Eloquent
{
	
	public function user(){
		return $this->belongsTo('User');
	}
}

?>