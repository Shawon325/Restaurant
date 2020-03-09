<?php

class table
{
	private $db;
	function __construct()
	{
		$this->db=new Database;
	}

	public function store_list()
	{
		$store=$this->db->select("stores_list","status='Active'");
		if($store)
		{
			return $store;
		}
		else
		{
			return false;
		}
	}
}

?>