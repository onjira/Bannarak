<?php
    require_once('../../Database/Connection.php');

    $db = new database();
    $db->connectdb();
    $AnnouncementID = $_POST["AnnouncementID"];

    /*query data from database*/
    $query = "SELECT * FROM Announcement WHERE AnnoucementID = '".$AnnouncementID."' LIMIT 0,1";

    $result = $db->querydb($query);
    $result = $db->fetch($result);
    $data = array();

    /*get data from database*/ 
    $data["Announcement"]["AnnouncementID"] = $result["AnnoucementID"];
    $data["Announcement"]["Topic"] = $result["Topic"];
    $data["Announcement"]["Type"] = $result["Type"];
    $data["Announcement"]["Detail"] = $result["Detail"];
    $data["Announcement"]["UpdateBy"] = $result["UpdateBy"];

    print json_encode($data);

?>
