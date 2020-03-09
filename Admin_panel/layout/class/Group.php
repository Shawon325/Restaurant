<?php

class Group
{
	private $db;
	private $fm;

	function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}

	public function insert($data)
	{
		$group_name=$this->fm->validation($data['group_name']);
		$status=$data['status'];
		if(empty($group_name) || empty($status))
		{
			?>
      		<div class="alert alert-warning" role="alert">Empty Field Required</div>
      		<?php
		}
		else
		{
			$insert=$this->db->insert("group_list","group_name='$group_name',status='$status'");
			if($insert)
			{
				?>
        		<div class="alert alert-success" role="alert">Successfully Product Added!</div>
        		<?php
			}
			else
			{
				?>
      			<div class="alert alert-warning" role="alert">Something Went Wrong</div>
      			<?php
			}
		}
	}

	public function group_list()
	{
		$list=$this->db->select_all("group_list");
		return $list;
	}

	
}


?>