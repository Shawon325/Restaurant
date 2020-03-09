<?php  

class login
{
	private $db;
	function __construct()
	{ 
		$this->db=new Database;
	}

	public function admin_login($data)
	{
		$email=$data['email'];
		$pass=$data['pass'];
		$password=md5($pass);
		if(empty($email)||empty($password))
		{
			echo "Field Is Required";
		}
		else if(!filter_var($email.FILTER_VALIDATE_EMAIL))
		{
			echo "Email Is Not Valid";
		}
		else
		{
			$login=$this->db->select("user_list","email='$email' AND pass='$password'");
			if($this->db->db->affected_rows>0)
			{ 
				$fetch=$login->fetch_assoc();
				Session::set("login",true);
				Session::set("email",$fetch['email']);
				Session::set("user_id",$fetch['id']);
				Session::set("store",$fetch['store']);
				header('Location:../Admin_panel/index.php');
			}
			else
			{
				echo "Email Or Password Was Wrong";
			}
		}
	}
}

?>