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

if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $img_target)){
  echo "The file ". basename( $_FILES["eventImage"]["name"]). " has been uploaded.";
} else {
  echo "Sorry, there was an error uploading your file.";
}

$addEventSQL = "INSERT INTO aa_events (eventTitle, eventDescription,
eventDate, eventTime, typeID, stageID, ticketPrice, imgRef)
VALUES ('$eventTitle', '$eventDescription',
'$eventDate', '$eventTime', '$typeID', '$stageID', '$ticketPrice', '$img_name')";

$queryResult = $dbConn->query($addEventSQL);

if ($queryResult === false) {
  echo "<p>Query failed: " . $dbConn->error . "</p>\n";
  exit;
} else {
  echo "<p>Event Added!</p>";
}

?>
