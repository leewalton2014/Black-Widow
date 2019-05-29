<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//get event id
$eventID = isset($_REQUEST['eventID']) ? $_REQUEST['eventID'] : null;

try{
    $dbConn = getConnection();
    //Get event info for selected event to be put into fields
    $deleteEvent = "DELETE FROM aa_events
                  WHERE eventID = '$eventID'";
    $deleteQuery = $dbConn->query($deleteEvent);
    if ($deleteQuery === false) {
      header('Location: editEventList.php');
      exit();
    } else {
      header('Location: editEventList.php');
      exit();
    }
}//end try
catch (Exception $e){
    header('Location: editEventList.php');
    exit();
}//end catch
?>
