<?php 
include_once '../Database/Database.php';
include_once '../Database/connect.php';
$db=new Database;

if (isset($_POST['del_id']))
{
	$id=$_POST['del_id'];
	$delete=$db->destroy("group_list","id=$id");
	if ($delete)
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
}

if (isset($_POST['edit_id']))
{
	$id=$_POST['edit_id'];
	$show_data=$db->select("group_list","id=$id")->fetch_assoc();
	if($show_data)
	{
		$data=json_encode($show_data);
		echo $data;
	}
	else
	{
		echo "Wrong";
	}
}

if (isset($_POST['e_group_name']))
{
	$id=$_POST['g_e_id'];
	$e_group_name=$_POST['e_group_name'];
	$e_status=$_POST['e_status'];
	if (empty($e_group_name)|| empty($e_status))
	{
		echo "empty";
	}
	else
	{
		$g_update=$db->update("group_list","group_name='$e_group_name',status='$e_status'","id='$id'");
		if($g_update)
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