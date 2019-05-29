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
$eventID = filter_has_var(INPUT_POST, 'eventID') ? $_POST['eventID'] : null;
$eventID = sanitise_input($eventID);

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

//set redirect link to prev page
if(isset($_SERVER['HTTP_REFERER'])){
  $redirect = $_SERVER['HTTP_REFERER'];
}else{
  //use browser local previous page
  $redirect = "javascript:history.go(-1)";
}

//check if image upload is Empty
if(empty($img_name)){
  //check form input
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
    echo "<p>Pleasse check form is filled out correctly. <a href='$redirect'>Try again.</a></p>\n";
  }else{
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
      echo "<p>Error updating record please try again or contact website developers. <a href='$redirect'>Try again.</a></p>\n";
      exit;
    } else {
      header("Location: editEventList.php");
      die();
    }
  }
}else{
  //check form input
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
    echo "<p>Pleasse check form is filled out correctly. <a href='$redirect'>Try again.</a></p>\n";
  }else{
  //upload image to directory
  if (move_uploaded_file($_FILES["eventImage"]["tmp_name"], $img_target)){
    echo "The file ". basename( $_FILES["eventImage"]["name"]). " has been uploaded.";
  } else {
    echo "<p>Sorry, there was an error uploading your file. <a href='$redirect'>Try again.</a></p>";
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
      echo "<p>Error updating record please try again or contact website developers. <a href='$redirect'>Try again.</a></p>\n";
      exit;
    } else {
      header("Location: editEventList.php");
      die();
    }
  }
}
echo "</div>";
echo endPage();
?>
