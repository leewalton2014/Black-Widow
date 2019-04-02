<?php
//link to functions script
require_once('functions.php');
    try{

        $dbConn = getConnection();
        $eventID = isset($_REQUEST['eventID']) ? $_REQUEST['eventID'] : null;
        //Query to retrieve event
        $sqlEvent = "SELECT eventID, eventTitle, eventDescription, eventDate, eventTime, eventType, stageNumber, stageCapacity, ticketPrice, imgRef
                      FROM aa_events
                      INNER JOIN aa_event_type ON aa_events.typeID = aa_event_type.typeID
                      INNER JOIN aa_event_stage ON aa_events.stageID = aa_event_stage.stageID
                      WHERE eventID = '$eventID'
                      ORDER BY eventTitle";
        $queryEventResult = $dbConn->query($sqlEvent);

        while ($rowObj = $queryEventResult->fetchObject()){
          //Display Event info
          echo "<div class='event_card'>\n";
          echo "<div class='eventTitle'><p>{$rowObj->eventTitle}</p></div>\n";
          echo "<div class='eventDescription'><p>{$rowObj->eventDescription}</p></div>\n";
          echo "<div class='eventDate'><p>Date: {$rowObj->eventDate}</p></div>\n";
          echo "<div class='eventTime'><p>Time: {$rowObj->eventTime}</p></div>\n";
          echo "<div class='eventType'><p>Event Type: {$rowObj->eventType}</p></div>\n";
          echo "<div class='stageNumber'><p>Stage Number: {$rowObj->stageNumber}</p></div>\n";
          echo "<div class='stageCapacity'><p>Tickets Available: {$rowObj->stageCapacity}</p></div>\n";
          echo "<div class='ticketPrice'><p>Price: {$rowObj->ticketPrice}</p></div>\n";
          echo "<div class='imgRef'><img src='Event_IMG/{$rowObj->imgRef}'></div>\n";
          echo "<a class='button' href='editEventForm.php?eventID={$rowObj->eventID}'>Edit event details</a>\n";
          echo "<form action='addToCart.php' method='POST' id='addToCartFRM'>\n";
          echo "<input type='hidden' value='{$rowObj->eventID}' name='eventID' id='eventID'/>\n";
          echo "<label for='ticketQuantity'>Ticket Quantity</label>\n";
          echo "<input type='number' min='1' value='1' name='ticketQuantity' id='ticketQuantity'/>\n";
          echo "<input type='submit' value='Add To Cart' name='addToCartBTN' id='addToCartBTN'/>\n";
          echo "</form>\n";
          echo "\n";
          echo "</div>\n";
        }//end while
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch
?>
