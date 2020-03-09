<?php
include_once '../Database/Database.php';
include_once '../Database/connect.php';
$db=new Database;


if(isset($_POST['product_id'])) 
{
	$id=$_POST['product_id'];
	$query=$db->select("products_list","id=$id")->fetch_assoc();
	if ($query) 
	{
		$value=json_encode($query);
		echo $value;
	}
}

if(isset($_POST['create']))
{
	$gross_amount=$_POST['gross_amount'];
	$service_charge_rate=$_POST['service_charge_rate'];
	$service_charge_amount=$_POST['service_charge_amount'];
	$vat_charge_rate=$_POST['vat_charge_rate'];
	$vat_charge_amount=$_POST['vat_charge_amount'];
	$discount=$_POST['discount'];
	$net_amount=$_POST['net_amount'];
	$user_id=$_POST['user_id'];
	$store=$_POST['store'];
	$table_id=$_POST['table_id'];

	$date_time=date("Y-m-d")."-".date("h-i");
	$bill_no="TINTIN".mt_rand(100000,1000000);

	if($service_charge_rate==0)
	{
		$add=$db->insert("orders","bill_no='$bill_no',date_time='$date_time',gross_amount='$gross_amount',vat_charge_rate='$vat_charge_rate',vat_charge_amount='$vat_charge_amount',discount='$discount',net_amount='$net_amount',user_id='$user_id',table_id='$table_id',store='$store'");
	}
	else
	{
		$service_charge_amount=$_POST['service_charge_amount'];
		$add=$db->insert("orders","bill_no='$bill_no',date_time='$date_time',gross_amount='$gross_amount',service_charge_rate='$service_charge_rate',service_charge_amount='$service_charge_amount',vat_charge_rate='$vat_charge_rate',vat_charge_amount='$vat_charge_amount',discount='$discount',net_amount='$net_amount',user_id='$user_id',table_id='$table_id',store='$store'");
	}
	if($add)
	{
		echo ($add);
	}
	else
	{
		echo "error";
	}
}

// if (isset($_POST['create'])) 
// {
// 	$gross_amount=$_POST['gross_amount'];
// 	$service_charge_rate=$_POST['service_charge_rate'];
// 	$service_charge_amount=$_POST['service_charge_amount'];
// 	$vat_charge_rate=$_POST['vat_charge_rate'];
// 	$vat_charge_amount=$_POST['vat_charge_amount'];
// 	$discount=$_POST['discount'];
// 	$net_amount=$_POST['net_amount'];
// 	$user_id=$_POST['user_id'];
// 	$store=$_POST['store'];
// 	$table_id=$_POST['table_id'];

// 	$date_time=date("Y-m-d")."-".date("h-i");
// 	$bill_no="TINTIN".mt_rand(100000,1000000);

// 	if ($service_charge_rate==0) 
// 	{
// 		$add=$db->insert("orders","bill_no='$bill_no',date_time='$date_time',gross_amount='$gross_amount',vat_charge_rate='$vat_charge_rate',vat_charge_amount='$vat_charge_amount',discount='$discount',net_amount='$net_amount',user_id='$user_id',table_id='$table_id',store='$store'");
// 	}
// 	else
// 	{
// 		$service_charge_amount=$_POST['service_charge_amount'];
// 		$add=$db->insert("orders","bill_no='$bill_no',date_time='$date_time',gross_amount='$gross_amount',service_charge_rate='$service_charge_rate',service_charge_amount='$service_charge_amount',vat_charge_rate='$vat_charge_rate',vat_charge_amount='$vat_charge_amount',discount='$discount',net_amount='$net_amount',user_id='$user_id',table_id='$table_id',store='$store'");
// 	}
// 	if ($add) 
// 	{
// 		echo($add);
// 	}
// 	else
// 	{
// 		echo "error";
// 	}
// }
?>