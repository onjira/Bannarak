<?php
    /* Include Database Connection Component */
    require_once('../../Database/Connection.php');

    /* Connect Database */
    $db = new database();
    $db->connectdb();

    /* Variable Setting */
    $AnnouncementID = $_POST["AnnouncementID"];
    $query = "SELECT * FROM Announcement WHERE AnnoucementID = '".$AnnouncementID."' LIMIT 0,1";
    $result = $db->querydb($query);
    $result = $db->fetch($result);
    $data = array();

    /* Get Data From Database */
    $data["Announcement"]["AnnouncementID"] = $result["AnnoucementID"];
    $data["Announcement"]["Topic"] = $result["Topic"];
    $data["Announcement"]["Type"] = $result["Type"];
    $data["Announcement"]["Detail"] = $result["Detail"];
    $data["Announcement"]["UpdateBy"] = $result["UpdateBy"];

    /* Close Database */
    $db->closedb();
    
    /* Return for Response */
    print json_encode($data);

?>