<?php
	/* Include Database Connection Component */
	require_once('../../Database/Connection.php');

	/* Connect Database */
	$db = new database;
	$db->connectdb();

	/* Variable Setting */
	$Type = $_POST["Type"];
	$Topic = $_POST["Topic"];
	$StartFrom = $_POST["StartFrom"];
	$StartTo = $_POST["StartTo"];
	if($StartFrom != ""){$StartFrom = date('Y-m-d',strtotime($StartFrom));}
	if($StartTo != ""){$StartTo = date('Y-m-d',strtotime($StartTo));}

	$query = "SELECT * FROM Announcement ";
	$query2 = "";
	if( $Type != "" ){
		$query2 .= ($query2 == "")? " WHERE Type = '".$Type."'" : " AND Type = '".$Type."'";
	}
	if( $Topic != "" ){
		$query2 .= ($query2 == "")? " WHERE Topic LIKE  '%".$Topic."%'" : " AND Topic LIKE '%".$Topic."%'";
	}
	if( $StartFrom != "" ){
		$query2 .= ($query2 == "")? " WHERE UpdateDate >= '".$StartFrom."'" : " AND UpdateDate >= '".$StartFrom."'";
	}
	if( $StartTo != "" ){
		$query2 .= ($query2 == "")? " WHERE UpdateDate <= '".$StartTo."'" : " AND UpdateDate <= '".$StartTo."'";
	}
	$query = $query.$query2;

	/* Query Data from Database via $db->querydb */
	$result = $db->querydb($query);

	/* Get Return Data via $resullt */
	/* as HTML for Form Table */
	$i = 1;
	$data = "<tr class='text-bold'><td class = 'num'>ID</td><td>Topic</td><td>Type</td><td>Detail</td><td>Date</td><td>By</td></tr>";
	while($row = mysqli_fetch_assoc($result)){
		$data .= "<tr><td class ='num'>".$row['AnnoucementID']."</td><td>".$row['Topic']."</td><td>".$row['Type']."</td><td>".$row['Detail']."</td><td>";
		$data .= $row['UpdateDate']."</td><td>".$row['UpdateBy']."</td><td>";
		$data .= "<button type='submit' class='btn btn-flat btn-primary ink-reaction' onclick = toEdit('".$row["AnnoucementID"]."')>Update</button></td></tr>";
		$i++;
	}

	/* Close Database */
	$db->closedb();

	/* Return for Response */
	print $data;
?>