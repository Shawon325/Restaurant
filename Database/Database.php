<?php

class Database{

	private $server_name=SERVER_NAME;
	private $user_name=USER_NAME;
	private $password=USER_PASS;
	private $database=DB_NAME;

	public $db;

	public function __construct()
	{
		$this->connection();
	}

	private function connection()
	{
		$this->db=new mysqli($this->server_name,$this->user_name,$this->password,$this->database);
		if(!$this->db)
		{
			die("Database Connection Problem".__LINE__);
		}
	}

	public function insert($table,$value)
	{
		$query="INSERT INTO $table SET $value";
		$insert=$this->db->query($query) or die("ERROR".__LINE__);
		if($this->db->affected_rows>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function select($table,$condition)
	{
		$query="SELECT * FROM $table WHERE $condition";
		$select=$this->db->query($query) or die("ERROR".__LINE__);
		if($this->db->affected_rows>0)
		{
			return $select;
		}
		else
		{
			return false;
		}
	}

	public function select_all($table)
	{
		$query="SELECT * FROM $table";
		$select_all=$this->db->query($query) or die("ERROR".__LINE__);
		if($this->db->affected_rows>0)
		{
			return $select_all;
		}
		else
		{
			return false;
		}
	}

	public function get($data,$table,$condition)
	{
		$query="SELECT $data FROM $table WHERE $condition";
		$get=$this->db->query($query) or die("ERROR".__LINE__);
		if($this->db->affected_rows>0)
		{
			return $get;
		}
		else
		{
			return false;
		}
	}

	public function destroy($table,$condition)
	{
		$query="DELETE FROM $table WHERE $condition";
		$destroy=$this->db->query($query) or die("ERROR".__LINE__);
		if($destroy)
		{
			return $destroy;
		}
		else
		{
			return false;
		}
	}

	public function update($table,$value,$condition)
	{
		$query="UPDATE $table SET $value WHERE $condition";
		$update=$this->db->query($query) or die("ERROR".__LINE__);
		if($this->db->affected_rows>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update_all($table,$value)
	{
		$query="UPDATE $table SET $value";
		$update=$this->db->query($query) or die("ERROR".__LINE__);
		if($this->db->affected_rows>0)
		{
			return $update;
		}
		else
		{
			return false;
		}
	}

	// public function login($table,$cols,$comdition)
	// {
	// 	$query="SELECT * FROM $table WHERE $condition";
	// 	$login=$this->db->query($query) or die("ERROR".__LINE__);
	// 	if($this->db->affected_rows>0)
	// 	{
	// 		return $login;
	// 	}
	// 	else
	// 	{
	// 		return false;
	// 	}
	// }

}

?>
