<?php
include_once "../Database/connect.php";
include_once "../Database/Database.php";
spl_autoload_register(function($class){
  include 'layout/Class/'.$class.'.php';
});
$db=new Database;

if(isset($_POST['company_info']))
{
	$company_info=$_POST['company_info'];
	$show_company_info=$db->select_all("company_info")->fetch_assoc();
	if($show_company_info)
	{
		$data=json_encode($show_company_info);
		echo $data;
	}
}

if(isset($_POST['vat_charge']))
{
	$company_name=$_POST['company_name'];
	$charge_amount=$_POST['charge_amount'];
	$vat_charge=$_POST['vat_charge'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$country=$_POST['country'];
	$message=$_POST['message'];
	$currency=$_POST['currency'];
	$e_company_info=$db->update_all("company_info","company_name='$company_name',charge_amount='$charge_amount',vat_charge='$vat_charge',address='$address',phone='$phone',country='$country',message='$message',currency='$currency'");
	if($e_company_info)
	{
		echo "update";
	}
	else
	{
		echo "error";
	}
}
?>
