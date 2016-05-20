<?php 
	/* Include Database Connection Component */
	require_once('../../Database/Connection.php');

	/* Connect Database */
	$db  =  new database;
	$db->connectdb();

	/* Variable Setting */
	$Topic =  $_POST["Topic"];
	$Type = $_POST["Type"];
	$Detail =  $_POST["Detail"];
	$UpdateBy = $_POST["UpdateBy"];
	$UpdateDate = date('Y-m-d');
	$data = array("Topic"=>$Topic, "Type"=>$Type , "Detail"=>$Detail, "UpdateBy"=>$UpdateBy, "UpdateDate"=>$UpdateDate);

	/* Insert Data to DB via $db->add */
	$query = $db->add("announcement", $data);

	/* Close Database */
	$db->closedb();

	/* Return for Response */
	print $query;
?>