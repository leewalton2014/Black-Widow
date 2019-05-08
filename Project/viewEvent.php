<?php
//link to functions script
require_once('functions.php');
echo startPage();
echo "<img id='logo' src='Images/logo.png'/>";
    try{
        $dbConn = getConnection();
        $eventID = isset($_REQUEST['eventID']) ? $_REQUEST['eventID'] : null;
        //Query to retrieve event
        $sqlEvent = "SELECT eventID, eventTitle, eventDescription, eventDate, eventTime, eventType, stageNumber, stageCapacity, ticketPrice, imgRef
                      FROM aa_events
                      INNER JOIN aa_event_type ON aa_events.typeID = aa_event_type.typeID
                      INNER JOIN aa_event_stage ON aa_events.stageID = aa_event_stage.stageID
                      WHERE eventID = '$eventID'";
        $queryEventResult = $dbConn->query($sqlEvent);
        while ($rowObj = $queryEventResult->fetchObject()){
          //Display Event info
          echo "<div class='event_card'>
            <img class='imgRef' src='Event_IMG/{$rowObj->imgRef}' alt='Images/event.png'/>
            <h2 class='eventTitle'>{$rowObj->eventTitle}</h2>
            <span class='eventDate'><img class='eventIcon' src='icons/iconmonstr-calendar-4-24.png'/>{$rowObj->eventDate}</span>
            <span class='eventTime'><img class='eventIcon' src='icons/iconmonstr-time-1-24.png'/>{$rowObj->eventTime}</span>
          </div>
          <div class='event_card_more'>
            <div class='left'>
              <h2 class='eventTitle'>{$rowObj->eventTitle}</h2>
              <p class='eventDescription'>{$rowObj->eventDescription}</p>
              <span class='eventType'>Event Type: {$rowObj->eventType}</span>
              <span class='stageNumber'>Stage: {$rowObj->stageNumber}</span>
            </div>
            <form action='addToCart.php' method='POST' id='addToCartFRM' name='addToCartFRM'>
            <input type='hidden' value='{$rowObj->eventID}' name='eventID' id='eventID'/>
            <div class='right'>
              <h2>Buy a ticket</h2>
              <span class='ticketPrice'>£{$rowObj->ticketPrice}</span>
              <p>Tickets Available!</p>
              <p>Quantity:</p>
              <input type='number' min='1' value='1' name='ticketQuantity' id='ticketQuantity'/>
              <button type='submit' form='addToCartFRM'><img class='cartIcon' src='icons/iconmonstr-shopping-cart-3-24.png'/>Add to cart</button>
            </div>
            </form>
          </div>";

          //echo "<div class='event_card'>\n";
          //echo "<div class='eventTitle'><p>{$rowObj->eventTitle}</p></div>\n";
          //echo "<div class='eventDescription'><p>{$rowObj->eventDescription}</p></div>\n";
          //echo "<div class='eventDate'><p>Date: {$rowObj->eventDate}</p></div>\n";
          //echo "<div class='eventTime'><p>Time: {$rowObj->eventTime}</p></div>\n";
          //echo "<div class='eventType'><p>Event Type: {$rowObj->eventType}</p></div>\n";
          //echo "<div class='stageNumber'><p>Stage Number: {$rowObj->stageNumber}</p></div>\n";
          //echo "<div class='stageCapacity'><p>Tickets Available: {$rowObj->stageCapacity}</p></div>\n";
          //echo "<div class='ticketPrice'><p>Price: {$rowObj->ticketPrice}</p></div>\n";
          //echo "<div class='imgRef'><img src='Event_IMG/{$rowObj->imgRef}'></div>\n";
          //echo "<a class='button' href='editEventForm.php?eventID={$rowObj->eventID}'>Edit event details</a>\n";
          //echo "<form action='addToCart.php' method='POST' id='addToCartFRM'>\n";
          //echo "<input type='hidden' value='{$rowObj->eventID}' name='eventID' id='eventID'/>\n";
          //echo "<label for='ticketQuantity'>Ticket Quantity</label>\n";
          //echo "<input type='number' min='1' value='1' name='ticketQuantity' id='ticketQuantity'/>\n";
          //echo "<input type='submit' value='Add To Cart' name='addToCartBTN' id='addToCartBTN'/>\n";
          //echo "</form>\n";
          //echo "\n";
          //echo "</div>\n";

        }//end while
    }//end try
    catch (Exception $e){
        echo "<p>Query failed: ".$e->getMessage()."</p>\n";
      }//end catch

echo endPage();
?>
