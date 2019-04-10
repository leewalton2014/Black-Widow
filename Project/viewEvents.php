<?php
//link to functions script
require_once('functions.php');
echo startPage();
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
          echo "<div class='event_card'>\n";
          echo "<div class='eventTitle'><p>{$rowObj->eventTitle}</p></div>\n";
          echo "<div class='eventDescription'><p>{$rowObj->eventDescription}</p></div>\n";
          echo "<div class='eventDate'><p>Date: {$rowObj->eventDate}</p></div>\n";
          echo "<div class='eventTime'><p>Time: {$rowObj->eventTime}</p></div>\n";
          echo "<div class='eventType'><p>Event Type:{$rowObj->eventType}</p></div>\n";
          echo "<div class='stageNumber'><p>Stage Number: {$rowObj->stageNumber}</p></div>\n";
          echo "<div class='stageCapacity'><p>Tickets Available: {$rowObj->stageCapacity}</p></div>\n";
          echo "<div class='ticketPrice'><p>Price: {$rowObj->ticketPrice}</p></div>\n";
          echo "<div class='imgRef'><img src='Event_IMG/{$rowObj->imgRef}'></div>\n";
          echo "<a class='button' href='editEventForm.php?eventID={$rowObj->eventID}'>Edit event details</a>\n";
          echo "<a class='button' href='viewEvent.php?eventID={$rowObj->eventID}'>View Event Page</a>\n";
          echo "</div>\n";
        }//end while
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch

echo endPage();
?>
