<?php

include_once "../Database/connect.php";
include_once "../Database/Database.php";
spl_autoload_register(function($class){
  include 'layout/Class/'.$class.'.php';
});
$db=new Database;
// $fm=new Format;


if(isset($_POST['group']))
{
	$group=$_POST['group'];
	$store=$_POST['store'];
	$user_name=$_POST['user_name'];
	$email=$_POST['email'];
	$pass=md5($_POST['pass']);
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];

	
	// move_uploaded_file($file_temp, $file_unique_name);

	if (empty($group)||empty($store)||empty($user_name)||empty($email)||empty($pass)||empty($first_name)||empty($last_name)||empty($phone)||empty($gender))
	{
		echo "empty";
	}
	else
	{

		$add_user=$db->insert("user_list","group_name='$group',store='$store',user_name='$user_name',email='$email',pass='$pass',first_name='$first_name',last_name='$last_name',phone='$phone',gender='$gender'");
		if ($add_user)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
}

if(isset($_POST['u_list']))
{
	$u_data=$db->select_all("user_list");
	$html="";

	$html.="<div class=\"table-responsive\">";
			$html.="<table id=\"dtBasicExample\" class=\"table table-striped table-bordered table-sm\" cellspacing=\"0\" width=\"100%\">";
			  $html.="<thead>";
			    $html.="<tr>";
			      $html.="<th>Group Name</th>";
			      $html.="<th>Store</th>";
			      $html.="<th>User Name </th>";
			      $html.="<th>Email </th>";
			      $html.="<th>Phone </th>";
			      $html.="<th>Gender</th>";
			      $html.="<th>Action</th>";
			    $html.="</tr>";
			  $html.="</thead>";
			  $html.="<tbody>";

			    foreach ($u_data as $key => $value)
			    {
			      $html.="<tr>";
			      $html.="<td>".$value['group_name']."</td>";
			      $html.="<td>".$value['store']."</td>";
			      $html.="<td>".$value['user_name']."</td>";
			      $html.="<td>".$value['email']."</td>";
			      $html.="<td>".$value['phone']."</td>";
			      $html.="<td>".$value['gender']."</td>";
			      $html.="<td>";
			      $html.="<button class=\"btn btn-info u_edit\" get_attr=\"".$value['id']."\" type=\"button\" name=\"edit\" data-toggle=\"modal\" data-target=\"#edit\">Edit</button>  <button class=\"btn btn-danger u_delete\" get_attr=\"".$value['id']."\" type=\"button\" name=\"delete\">Delete</button>";
			      $html.="</td>";
			      $html.="</tr>";
			    }

			  $html.="</tbody>";
			$html.="</table>";
		$html.="</div>";
		echo $html;

}



if(isset($_POST['u_delete']))
{
	$id=$_POST['u_delete'];
	$u_data_delete=$db->destroy("user_list","id='$id'");
	if($u_data_delete)
	{
		echo "delete";
	}
	else
	{
		echo "no delete";
	}
}

if(isset($_POST['u_id']))
{
	$id=$_POST['u_id'];
	$u_show=$db->select("user_list","id='$id'")->fetch_assoc();
	if($u_show)
	{
		$data=json_encode($u_show);
		echo $data;
	}
}

if(isset($_POST['e_group']) && isset($_POST['e_user_name']))
{
	$id=$_POST['e_u_id'];
	$group=$_POST['e_group'];
	$store=$_POST['e_store'];
	$user_name=$_POST['e_user_name'];
	$email=$_POST['e_email'];
	$first_name=$_POST['e_first_name'];
	$last_name=$_POST['e_last_name'];
	$phone=$_POST['e_phone'];
	$gender=$_POST['e_gender'];
	if(empty($group)||empty($store)||empty($user_name)||empty($email)||empty($first_name)||empty($last_name)||empty($phone)||empty($gender))
	{
		echo "e_empty";
	}
	else
	{
		$u_update=$db->update("user_list","group_name='$group',store='$store',user_name='$user_name',email='$email',first_name='$first_name',last_name='$last_name',phone='$phone',gender='$gender'","id='$id'");
		if($u_update)
		{
			echo "true";
		}
		else
		{
			echo "false";
		}
	}

}
?>
