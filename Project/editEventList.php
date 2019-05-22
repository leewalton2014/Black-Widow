<?php
//link to functions script
require_once('functions.php');
startHTML('Events', 'Select an event to modify');
pageHeader('Modify events');
titleBanner('Modify an Event', 'Select one of the events from the list to edit event details');
echo "<div class='parent'>";
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
echo "</div>";
echo "</article>";
echo endPage();
?>
