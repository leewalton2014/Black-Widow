<?php

require_once('functions.php');
//start session
setSessionPath();
try {
    $dbConn = getConnection();//Connect to db
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}
$eventID = filter_has_var(INPUT_POST, 'eventID') ? $_POST['eventID'] : null;
$eventID = trim($eventID);

$eventTitle = filter_has_var(INPUT_POST, 'eventTitle') ? $_POST['eventTitle'] : null;
$eventTitle = trim($eventTitle);

$eventDescription = filter_has_var(INPUT_POST, 'eventDescription') ? $_POST['eventDescription'] : null;
$eventDescription = trim($eventDescription);

$eventDate = filter_has_var(INPUT_POST, 'eventDate') ? $_POST['eventDate'] : null;
$eventDate = trim($eventDate);

$eventTime = filter_has_var(INPUT_POST, 'eventTime') ? $_POST['eventTime'] : null;
$eventTime = trim($eventTime);

$typeID = filter_has_var(INPUT_POST, 'typeID') ? $_POST['typeID'] : null;
$typeID = trim($typeID);

$stageID = filter_has_var(INPUT_POST, 'stageID') ? $_POST['stageID'] : null;
$stageID = trim($stageID);

$ticketPrice = filter_has_var(INPUT_POST, 'ticketPrice') ? $_POST['ticketPrice'] : null;
$ticketPrice = trim($ticketPrice);

//File upload Var
$img_dir = "Event_IMG/";
$img_target = $img_dir . basename($_FILES["eventImage"]["name"]);
$img_name = basename($_FILES["eventImage"]["name"]);
//check if image upload is Empty
if(empty($img_name)){
  //update event details excluding image reference
  $updateEvent = "UPDATE aa_events SET
  eventTitle = '$eventTitle',
  eventDescription = '$eventDescription',
  eventDate = '$eventDate',
  eventTime = '$eventTime',
  typeID = '$typeID',
  stageID = '$stageID',
  ticketPrice = '$ticketPrice'
  WHERE eventID = '$eventID'";
  $updateQuery = $dbConn->query($updateEvent);
  if ($updateQuery === false) {
    echo "<p>Error updating record please try again or contact website developers.</p>\n";
    exit;
  } else {
    header("Location: editEventList.php");
    die();
  }
}else{
  //upload image to directory
  if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $img_target)){
    echo "The file ". basename( $_FILES["eventImage"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  //update event details including image reference
  $updateEvent = "UPDATE aa_events SET
  eventTitle = '$eventTitle',
  eventDescription = '$eventDescription',
  eventDate = '$eventDate',
  eventTime = '$eventTime',
  typeID = '$typeID',
  stageID = '$stageID',
  ticketPrice = '$ticketPrice',
  imgRef = '$img_name'
  WHERE eventID = '$eventID'";
  $updateQuery = $dbConn->query($updateEvent);
  if ($updateQuery === false) {
    echo "<p>Error updating record please try again or contact website developers.</p>\n";
    exit;
  } else {
    header("Location: editEventList.php");
    die();
  }
}



?>
