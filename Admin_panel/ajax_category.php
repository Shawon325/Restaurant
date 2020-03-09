<?php
include_once '../Database/Database.php';
include_once '../Database/connect.php';
$db=new Database;

// ***************CATEGORY****************
// ADD
if (isset($_POST['category']))
{
  $category=$_POST['category'];
  $status=$_POST['status'];
  if (empty($category) || empty($status))
  {
    echo "empty";
  }
  else
  {
    $category_insert=$db->insert("category_list","category='$category',status='$status'");
    if ($category_insert)
    {
      echo "success";
    }
    else
    {
      echo "error";
    }
  }
}
// LIST
if (isset($_POST['list'])) {
  $list=$db->select_all("category_list");
  $div='';

  $div.="<div class=\"table-responsive\">";
    $div.="<table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">";
      $div.="<thead>";
        $div.="<tr>";
        $div.="<th>id</th>";
          $div.="<th>Category</th>";
          $div.="<th>Status</th>";
          $div.="<th>Action</th>";
        $div.="</tr>";
      $div.="</thead>";
      $div.="<tfoot>";
      $div.="</tfoot>";
      $div.="<tbody>";

  foreach ($list as $key => $value) {
            $div.="<tr>";
            $div.="<td>".$value['id']."</td>";
            $div.="<td>".$value['category']."</td>";
            $div.="<td>".$value['status']."</td>";
            $div.="<td>";
              $div.="<button type=\"button\" get_attr=\"".$value['id']."\" class=\"btn btn-info edit\" data-toggle=\"modal\" data-target=\"#edit\" name=\"button\">Edit</button>&nbsp";
              $div.="<button type=\"button\" get_attr=\"".$value['id']."\" class=\"btn btn-danger del_button\" name=\"button\">Delete</button>";
            $div.="</td>";
            $div.="</tr>";
  }

  $div.="</tbody>";
$div.="</table>";
  echo $div;
}
// DELETE
if (isset($_POST['cat_delid']))
{
  $id=$_POST['cat_delid'];
  $delete=$db->destroy("category_list","id='$id'");
  if ($delete)
  {
    echo "delete";
  }
  else{
    echo "no delete";
  }
}
// EDIT
if (isset($_POST['edit_id']))
{
  $id=$_POST['edit_id'];
  $edit=$db->select("category_list","id='$id'")->fetch_assoc();
  if ($edit)
  {
    $data=json_encode($edit);
    echo $data;
  }
  else {
    echo "Something Went Wrong";
  }
}

if (isset($_POST['edit_category']) && isset($_POST['edit_status']))
{
  $id=$_POST['eid'];
  $category=$_POST['edit_category'];
  $status=$_POST['edit_status'];
  $edit_cat=$db->update("category_list","category='$category',status='$status'","id=$id");
  if ($edit_cat)
  {
    echo "true";
  }
  else
  {
    echo "error";
  }
}
// ***************CATEGORY****************
?>
