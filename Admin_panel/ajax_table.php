<?php
include_once '../Database/Database.php';
include_once '../Database/connect.php';
$db=new Database;
// ***************TABLES******************
if (isset($_POST['table_name']) || isset($_POST['status']) || isset($_POST['store']) || isset($_POST['capacity']))
{
  $table_name=$_POST['table_name'];
  $status=$_POST['status'];
  $store=$_POST['store'];
  $capacity=$_POST['capacity'];

  $table_insert=$db->insert("table_list","table_name='$table_name',status='$status',store='$store',capacity='$capacity'");
  if ($table_insert)
  {
    echo "true";
  }
  else {
    echo "false";
  }
}
// LIST
if (isset($_POST['t_list']))
{
  $t_data=$db->select_all("table_list");
  $html='';

    $html.="<div class=\"table-responsive\">";
    $html.="<table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">";
    $html.="<thead>";
    $html.="<tr>";
          $html.="<th>Table Name</th>";
          $html.="<th>Capacity</th>";
          $html.="<th>Status</th>";
          $html.="<th>Store</th>";
          $html.="<th>Action</th>";
        $html.="</tr>";
      $html.="</thead>";
      $html.="<tbody>";

        foreach ($t_data as $key => $value)
        {
          $html.="<tr>";
          $html.="<td>".$value['table_name']."</td>";
          $html.="<td>".$value['capacity']."</td>";
          $html.="<td>".$value['status']."</td>";
          $html.="<td>".$value['store']."</td>";
          $html.="<td>";
          $html.="<button class=\"btn btn-info table_edit\" get_attr=\"".$value['id']."\" type=\"button\" data-toggle=\"modal\" data-target=\"#table_edit\">Edit</button>&nbsp";
          $html.="<button type=\"button\" get_attr=\"".$value['id']."\"  class=\"btn btn-danger delete\">Delete</button>";
          $html.="</td>";
          $html.="</tr>";
        }

      $html.="</tbody>";
    $html.="</table>";
  $html.="</div>";

  echo $html;
}
// DELETE
if (isset($_POST['del_id']))
{
  $id=$_POST['del_id'];
  $delete=$db->destroy("table_list","id=$id");
  if ($delete)
  {
    echo "True";
  }
  else {
    echo "Error";
  }
}
// SHOW
if (isset($_POST['eid']))
{
  $id=$_POST['eid'];
  $table=$db->select("table_list","id=$id")->fetch_assoc();
  if ($table)
  {
    $table_list=json_encode($table);
    echo $table_list;
  }
  else {
    echo "Wrong";
  }
}
// Update
if (isset($_POST['e_table_name']) || isset($_POST['e_status']))
{
    $table_name=$_POST['e_table_name'];
    $status=$_POST['e_status'];
    $store=$_POST['e_store'];
    $capacity=$_POST['e_capacity'];
    $id=$_POST['edit_id'];
    $update=$db->update("table_list","table_name='$table_name',status='$status',store='$store',capacity='$capacity'","id='$id'");
    if ($update)
    {
      echo "success";
    }
    else {
      echo "wrong";
    }
}
// ***************TABLES******************
?>
