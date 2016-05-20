<?php 
	/* Include Database Connection Component */
	require_once('../../Database/Connection.php');

	/* Connect Database */
	$db  =  new database;
	$db->connectdb();

	/* Variable Setting */
	$AnnouncementID =  $_POST["AnnouncementID"];
	$Topic =  $_POST["Topic"];
	$Type = $_POST["Type"];
	$Detail =  $_POST["Detail"];
	$UpdateBy = $_POST["UpdateBy"];
	$UpdateDate = date('Y-m-d');
	
	/* Update Data via $db->update  */
	$data = array("AnnoucementID"=>$AnnouncementID, "Topic"=>$Topic, "Type"=>$Type, "Detail"=>$Detail, "UpdateBy"=>$UpdateBy, "UpdateDate"=>$UpdateDate);
	$where = "AnnoucementID = '".$AnnouncementID."'";
	$inst = $db->update("announcement", $data, $where);

	/* Close Database */
	$db->closedb();

	/* Return for Response */
	print $inst;

?>