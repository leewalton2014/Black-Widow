<?php
//link to functions script
require_once('functions.php');
//start session
setSessionPath();
//start page layout
startHTML('Events', 'Select an event to modify');
pageHeader('Modify events');
titleBanner('Modify an Event', 'Select one of the events from the list to edit event details');
echo "<div class='parent'>";
if (isset($_SESSION['admin']) && $_SESSION['admin']){
echo"<div>";
//display list
echo "<table class='editEvents'>\n
            <tr>\n
            <th class='editTitle'>Event</th>\n
            <th class='editDesc'>Description</th>\n
            <th class='editDate'>Date</th>\n
            <th class='deleteEvent'>Remove Event</th>\n
            </tr>\n";
    try{
        $dbConn = getConnection();
        //Query to retrieve events
        $sqlEvents = "SELECT eventID, eventTitle, eventDescription, eventDate, eventTime, eventType, stageNumber, stageCapacity, ticketPrice, imgRef
                      FROM aa_events
                      INNER JOIN aa_event_type ON aa_events.typeID = aa_event_type.typeID
                      INNER JOIN aa_event_stage ON aa_events.stageID = aa_event_stage.stageID
                      ORDER BY eventTitle";
        $queryEventsResult = $dbConn->query($sqlEvents);

        while ($rowObj = $queryEventsResult->fetchObject()){
          //Display Event info
          $eventDate = date_create("{$rowObj->eventDate}");
          $date = date_format($eventDate, "d/m/y");
            echo "<tr>\n";
            //link to form to update info for chosen record
            echo "<td class='editTitle'><a class='button' href='editEvent.php?eventID={$rowObj->eventID}'>{$rowObj->eventTitle}</a></td>\n";
            echo "<td class='editDesc'>{$rowObj->eventDescription}</td>\n";
            echo "<td class='editDate'>$date</td>\n";
            echo "<td class='deleteEvent'><a class='button' href='deleteEvent.php?eventID={$rowObj->eventID}'>Remove</a></td>\n";
            echo "</tr>\n";
        }//end while
    }//end try
    catch (Exception $e){
        echo "<p>Connection to database failled please contact website developer.</p>\n";
      }//end catch
echo "</table>";
if(isset($_SERVER['HTTP_REFERER'])){
  $redirect = $_SERVER['HTTP_REFERER'];
}else{
  //use browser local previous page
  $redirect = "javascript:history.go(-1)";
}
echo "<a class='button' href='$redirect'>Back</a>\n";
echo"</div>";
}else{
  //redirect to admin dashboard
  header('Location: adminDash.php');
  die();
}
echo "</div>";
echo "</article>";
echo endPage();
?>
