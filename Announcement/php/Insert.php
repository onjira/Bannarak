<?php 
	require_once('../../Database/Connection.php');

	$db  =  new database;
	$db->connectdb();

	$Topic =  $_POST["Topic"];
	$Type = $_POST["Type"];
	$Detail =  $_POST["Detail"];
	$UpdateBy = $_POST["UpdateBy"];
	$UpdateDate = date('Y-m-d');

	$data = array("Topic"=>$Topic, "Type"=>$Type , "Detail"=>$Detail, "UpdateBy"=>$UpdateBy, "UpdateDate"=>$UpdateDate);
	
	$query = $db->add("announcement", $data);
	print $query;
?>