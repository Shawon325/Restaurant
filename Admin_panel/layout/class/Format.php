<?php

class Format
{
	
	public function validation($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		$data=stripcslashes($data);
		return $data;
	}
}