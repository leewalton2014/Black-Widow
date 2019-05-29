<?php
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Create Event', 'Create a new event page');
pageHeader('');
titleBanner('Please try again', 'Ensure all fields are populated');
echo "<div class='parent'>\n";

try {
    $dbConn = getConnection();//Connect to db
}
catch (Exception $e) {
    echo "<p>Query failed: ".$e->getMessage()."</p>\n";
}

//form input variables
$eventTitle = filter_has_var(INPUT_POST, 'eventTitle') ? $_POST['eventTitle'] : null;
$eventTitle = sanitise_input($eventTitle);

$eventDescription = filter_has_var(INPUT_POST, 'eventDescription') ? $_POST['eventDescription'] : null;
$eventDescription = sanitise_input($eventDescription);

$eventDate = filter_has_var(INPUT_POST, 'eventDate') ? $_POST['eventDate'] : null;
$eventDate = sanitise_input($eventDate);

$eventTime = filter_has_var(INPUT_POST, 'eventTime') ? $_POST['eventTime'] : null;
$eventTime = sanitise_input($eventTime);

$typeID = filter_has_var(INPUT_POST, 'typeID') ? $_POST['typeID'] : null;
$typeID = sanitise_input($typeID);

$stageID = filter_has_var(INPUT_POST, 'stageID') ? $_POST['stageID'] : null;
$stageID = sanitise_input($stageID);

$ticketPrice = filter_has_var(INPUT_POST, 'ticketPrice') ? $_POST['ticketPrice'] : null;
$ticketPrice = sanitise_input($ticketPrice);

//File upload Var
$img_dir = "Event_IMG/";
$img_target = $img_dir . basename($_FILES["eventImage"]["name"]);
$img_name = basename($_FILES["eventImage"]["name"]);

//Query
$addEventSQL = "INSERT INTO aa_events (eventTitle, eventDescription,
eventDate, eventTime, typeID, stageID, ticketPrice, imgRef)
VALUES ('$eventTitle', '$eventDescription',
'$eventDate', '$eventTime', '$typeID', '$stageID', '$ticketPrice', '$img_name')";

//validate form input
$required = array('eventTitle','eventDescription','eventDate','eventTime','typeID','stageID','ticketPrice');
$error = false;
//check form elements are not empty
foreach($required as $field){
  if(empty($_POST[$field])){
    $error = true;
  }
}
//check price is a float number
if(!filter_var($ticketPrice, FILTER_VALIDATE_FLOAT)){
  $error = true;
}
if($error){
  echo "<p>Pleasse check form is filled out correctly. <a href='addEventForm.php'>Try again.</a></p>\n";
}else{
  if(move_uploaded_file($_FILES["eventImage"]["tmp_name"], $img_target)){
    //execute query
    try {
        $queryResult = $dbConn->exec($addEventSQL);
    }
    catch (Exception $e) {
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
    }

    if($queryResult === false){
      echo "<p>Query failed. <a href='addEventForm.php'>Try again.</a></p>\n";
    }else{
      //redirect back to dashboard
      header("Location: adminDash.php");
      die();
    }
  }else{
    echo "<p>Please upload an event image. <a href='addEventForm.php'>Try again.</a></p>";
  }
}
echo "</div>";
echo endPage();
?>
