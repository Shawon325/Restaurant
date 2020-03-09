<?php
include_once "../Database/connect.php";
include_once "../Database/Database.php";
$db=new Database;


if(isset($_POST['store_name']) && isset($_POST['status']))
{
	$store_name=$_POST['store_name'];
	$status=$_POST['status'];
	if(empty($store_name)||empty($status))
	{
		echo "empty";
	}
	else
	{
		$add_store=$db->insert("stores_list","store_name='$store_name',status='$status'");
		if($add_store)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
	}
}

if(isset($_POST['s_list']))
{
	$s_data=$db->select_all("stores_list");
	$html="";

	$html.="<div class=\"table-responsive\">";
			$html.="<table id=\"dtBasicExample\" class=\"table table-striped table-bordered table-sm\" cellspacing=\"0\" width=\"100%\">";
			  $html.="<thead>";
			    $html.="<tr>";
			      $html.="<th>Store Name</th>";
			      $html.="<th>Status</th>";
			      $html.="<th>Action</th>";
			    $html.="</tr>";
			  $html.="</thead>";
			  $html.="<tbody>";
			  foreach ($s_data as $key => $value)
			  {
			    $html.="<tr>";
			      $html.="<td>".$value['store_name']."</td>";
			      $html.="<td>".$value['status']."</td>";
			      $html.="<td>";
			      	$html.="<button class=\"btn btn-info s_edit\" get_attr=\"".$value['id']."\" type=\"button\" name=\"edit\" data-toggle=\"modal\" data-target=\"#edit\">Edit</button>  <button class=\"btn btn-danger s_delete\" get_attr=\"".$value['id']."\" type=\"button\" name=\"delete\">Delete</button>";
			      $html.="</td>";
			    $html.="</tr>";
			  }
			  $html.="</tbody>";
			 $html.="</table>";
		$html.="</div>";
		echo $html;
}

if(isset($_POST['s_delete']))
{
	$id=$_POST['s_delete'];
	$s_data_delete=$db->destroy("stores_list","id='$id'");
	if($s_data_delete)
	{
		echo "delete";
	}
	else
	{
		echo "no delete";
	}
}

if(isset($_POST['s_id']))
{
	$id=$_POST['s_id'];
	$s_show=$db->select("stores_list","id='$id'")->fetch_assoc();
	if($s_show)
	{
		$data=json_encode($s_show);
		echo $data;
	}
}


if(isset($_POST['e_store_name']) && isset($_POST['e_status']))
{
	$id=$_POST['e_s_id'];
	$store_name=$_POST['e_store_name'];
	$status=$_POST['e_status'];
	$msg=0;
	if(empty($store_name)||empty($status))
	{
		$msg=503;
	}
	else
	{
		$s_update=$db->update("stores_list","store_name='$store_name',status='$status'","id='$id'");
		if($s_update)
		{
			$msg=200;
		}
		else
		{
			$msg=403;
		}
	}
	echo $msg;
}
?>
