<?php 
 
class Order
{
	private $db;
	function __construct()
	{
		$this->db=new Database;
	}

	public function table_list()
	{
		$table=$this->db->select("table_list","status='Active'");
		if($table)
		{
			return $table;
		}
		else
		{
			return false;
		}
	}

	public function products_list()
	{
		$product=$this->db->select("products_list","status='Active'");
		if($product)
		{
			return $product;
		}
		else
		{
			return false;
		}
	}
	public function vat()
	{
		$vat=$this->db->select_all("company_info")->fetch_assoc();
		if ($vat) {
			return $vat;
		}
	}

}

?>