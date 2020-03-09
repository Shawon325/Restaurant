<?php 
include_once '../Database/Database.php';
include_once '../Database/connect.php';
$db=new Database;

if (isset($_POST['del_id']))
{
  $id=$_POST['del_id'];
  $delete=$db->destroy("products_list","id=$id");
  if ($delete)
  {
    echo "true";
  }
  else {
    echo "false";
  }
}

if (isset($_POST['edit_id']))
{
  $id=$_POST['edit_id'];
  $show=$db->select("products_list","id=$id")->fetch_assoc();
  if ($show)
  {
    $data=json_encode($show);
    echo $data;
  }
  else {
    echo "Wrong";
  }
}
?>
